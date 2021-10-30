<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CustomerImport;
use App\Imports\UsersImport;
use App\Model\File;
use App\Model\Fileowner;
use App\Model\Group;
use App\Model\Invoice;
use App\Model\Task;
use App\Notifications\Addcunot;
use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;


class Customer_cont extends Controller
{

    public function login(){
    }

    public function csearch(Request $request)
    {
        $result = array();
        $out = array();
        $name = $request->input('keyword');
        if ($name) {
            $result=Customer::where('company','like',$name.'%')->orWhere('name','like',$name.'%')->get();
            echo '<ol>';
            $i = 1;
            foreach ($result as $row) {
                echo "<li onClick=\"selectCustomer( '" . $row['id'] . "','" . addslashes($row['name']) . " ','" . addslashes($row['company']) . "','" . $row['phone'] . "','" . $row['email'] . "')\"><span>$i</span><p>" . $row['name'] . " &nbsp; &nbsp  " . $row['company'] . "</p></li>";
                $i++;
            }
            echo '</ol>';
        }
    }
    public function customerSetIsActive(Request $request,$id, $value)
    {
        $employee = Customer::find($id);
        if(self::permision($employee,'Update')) {
            $employee->isactive =$value;
        $employee->update();
        return redirect()->back();}
        else{
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
    }
    public function dropzone(){
        return view('Crm.Customer.Upload');
    }
    public function filedelet(Request $request)
    {
        $filename =  $request->input('filename');
        $path=public_path().'/EmailSender/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
    public function fileStore(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('EmailSender'),$fileName);
        return response()->json(['success'=>$fileName]);
    }
    public function sendemail(Request $request, $id)
    {

        $Customer = Customer::find($id);
        if ($request->isMethod('post')) {
            //$files = File::allFiles(public_path().'/EmailSender');
            $files  = \File::files(public_path().'/EmailSender');
         // dd($files);
            $data['Customer'] = $Customer;
            require 'class.phpmailer.php';
            $name=$request->input('customername');
            $email=$request->input("mailtoc");
            $subject=$request->input("subject");
            $message=$request->input("message");
            $mail = new \PHPMailer();
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host ='mail.eritqaa.org'; //'mail.eritqaa.net';
            $mail->Username = 'noreply@eritqaa.org';//'noreply@eritqaa.net';
            $mail->Password = 'Noreply1234_';//'Noreply1234_';
            $mail->From = 'noreply@eritqaa.org';
            $mail->FromName = 'Eritqaa';

            $htmlContent = '<h2>Contact Request Submitted</h2>
                    <p><b>Name:</b> ' . $name . '</p>
                    <p><b>Email:</b> ' . $email . '</p>
                    <p><b>Phon:</b> ' . $subject . '</p>
                    <p>' . $message . '</p>
                    ';
            $mail->AddAddress($email,$name);
            $mail->Subject =$subject;
            $mail->Body =$message.'<br>' ;//"This is a sample message using SMTP authentication";
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $str1= "gmail.com";
            $str2=strtolower('mail.eritqaa.org');
            if(count($files)>0)
            foreach ( $files as $file) {
                $name= $file->getFilename();
                // dd($name);
                //$file->move(public_path().'/EmailSender/',$name);
                $mail->addAttachment(public_path().'/EmailSender/'.$name);
            }
            If(strstr($str2,$str1))
            {
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('Send  was successful added!'));
                }
                else {
                    $request->session()->flash('alert-danger', __('invoices Number existed'));
                }
            }
            else{
                $mail->Port = 25;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('Send  was 111 successful added!'));
                    $file = new Filesystem();
                    $file->cleanDirectory(public_path().'/EmailSender');
                }
                else {
                    $request->session()->flash('alert-danger', $mail->ErrorInfo);
                }
            }
            return redirect()->back();
        }else {

            $file = new Filesystem();
            $file->cleanDirectory(public_path().'/EmailSender');
            $arr['Customer'] = $Customer;
            return view('Crm.Customer.sendemail_view', $arr);
        }

    }
    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();
            $rolname = $input['rolename'];
            $input = $request->except(['rolename', '_token']);
            if ($input['email']!=null)
            {
            $validator = Validator::make($request->all(), [
                'email' => 'unique:customers,email,NULL,id,group_id,'.$input['group_id']
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('lang.The_Email_exists'));
                return redirect()->back();
            }}
            $user=Auth::user();
            $input['user_id']=$user->id;
            $temp_password = rand(200000, 999999);
            $input['password']=Hash::make($temp_password);
            $customer= Customer::create($input);
            if($customer){
                $user=User::find(1);
                Notification::send($user,new Addcunot($customer));
            }
            $files=$request->file('files');
            if(!is_null($files))
            foreach ($request->file('files') as $file) {
                $name= $file->getClientOriginalName();
                $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
               // dd(public_path());
                $file->move(public_path().'/Files/',$rand);
               // $filename = $file->store('Files');
                Fileowner::create([
                    'customer_id' => $customer->id,
                    'name' => $name,
                    'path' =>$rand,
                ]);
            }

            $customer->assignRole($rolname);

            $request->session()->flash('alert-success', __('User was successful added!').' Temporary Password is ' . $temp_password  );
            return redirect()->back();
        }else{
            $groups=Group::all();
            $arr['groups']=$groups;
            $roles = Role::where('guard_name','customer')->get();
            $arr['roles'] = $roles;
            return view('Crm.Customer.Add_view',$arr);
        }
    }
    public function index($type)
    {
        $user=Auth::user();
        if($type=='Del'){
            if($user->hasAnyPermission(['Only_My_Customers']))
            {   $customer=Customer::onlyTrashed()->where('user_id',$user->id)->get();}
            else
            $customer=Customer::onlyTrashed()->get();
        }
        else
        {
            if($user->hasAnyPermission(['Only_My_Customers'])){
                $customer=Customer::where('user_id',$user->id)->get();
            }
            else
            $customer=Customer::where('group_id','<>',5)->get();
        }
        $arr['customers']=$customer;
        return view('Crm.Customer.Index_view',$arr);
    }
    function sendRequest($site, $data)
    {
        $json = json_encode($data);
        $ch = curl_init($site);
        $header = array('Content-Type: application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    public function sendsms(Request $request, $id)
    {

        $Customer = Customer::find($id);
        if ($request->isMethod('post')) {
           // dd($request->all());
            $api_key  = '9b725bb0211f1c69735f0925eb03bd1f';            //ضع المفتاح الخاص بك الموجود بحسابك هنا
            $title    = 'ERiTQAA';      //ضع عنوان الارسال هنا .. يجب ان يكون فعال في حسابك
            $text	  = $request->input('text_message');    //محتوى الرسالة النصية هنا
            $sentto	  = $request->input('mobile'); //رقم الموبايل المستلم للرسالة
            $body = array("api_key" => $api_key, "title"=>$title, "text"=>$text,"sentto"=>$sentto);
            $result = $this->sendRequest('https://www.turkey-sms.com/api/v1/eritqaa/add-content', $body);
            $request->session()->flash('alert-success', __('lang.sendsms'));
            return redirect()->back();
        }else {
            $arr['Customer']=$Customer;
            return view('Crm.Customer.sendsms_view',$arr);
        }

    }
    public function delete(Request $request, $id)
    {
        $customer=Customer::find($id);
        if(self::permision($customer,'Delete')) {
            $customer->delete();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
            return redirect()->back();
    }
    public function forcedelete(Request $request, $id)
    {

        $Customer=Customer::onlyTrashed()->find($id);
        if(self::permision($Customer,'ForceDelete')) {
            $Customer->forceDelete();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();


    }
    public function restore(Request $request, $id)
    {
        $Customer=Customer::onlyTrashed()->find($id);
        if(self::permision($Customer,'ForceDelete')) {
            $Customer->restore();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();


    }
    public function update(Request $request, $id)
    {
        $Customer = Customer::find($id);


        if ($request->isMethod('post')) {
            $input=$request->all();
            $rolname = $input['rolename'];
            $input = $request->except(['rolename', '_token']);
           // dd($rolname);
            if($Customer->email!=$input['email'])
            {
            $validator = Validator::make($request->all(), [
                'email' =>[ 'unique:customers,email,NULL,id,group_id,'.$input['group_id'],
        ]
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('lang.The_Email_exists'));
                return redirect()->back();
            }}
            if(self::permision($Customer,'Update')) {
                $Customer->syncRoles([$rolname]);
                $Customer->update($request->all());
                $request->session()->flash('alert-success', __('Done'));
            }
            else {
                $request->session()->flash('alert-danger', __('You dont have permasion'));
            }



            return redirect()->back();
        } else {

            $groups=Group::all();
            $files=Fileowner::where('customer_id',$id)->get();
           $arr['files']=$files;
            $roles = Role::where('guard_name','customer')->get();
            $arr['roles'] = $roles;
            $arr['groups']=$groups;
              $arr['customer']=$Customer;
            return view('Crm.Customer.Update_view', $arr);
        }

    }
    public function view(Request $request, $id)
    {
        $Customer = Customer::find($id);
        $files=Fileowner::where('customer_id',$id)->get();
        $Invoices=Invoice::where('customer_id',$id)->get();
        $Tasks=Task::where('customer_id',$id)->get();
        $arr['files']=$files;
        $arr['customer'] = $Customer;
        $arr['invoices'] = $Invoices;

        //dd($Tasks);
        $arr['Tasks'] = $Tasks;
        return view('Crm.Customer.View_view', $arr);
    }
    public function reset(Request $request, $id)
    {
        $Customer = Customer::find($id);
        if(!self::permision($Customer,'Update')) {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('password and password confirmation not similer'));
                return redirect()->back();
            }
            $Customer->password = Hash::make($request->password);
            $Customer->save();
            $request->session()->flash('alert-success', __('User was successful Update password!')  );
            return redirect()->back();
        }else{

            return view('Crm.Customer.Reset_view');
        }

    }
    public static function permision( $ob,$Type)
    {
        if (!Auth::user()){
            return redirect(route('login'));
        }
        if(is_null($ob))
        {
            if(Auth::user()->hasAnyRole(['Admin']) ||
                Auth::user()->hasAnyPermission([
                    $Type
                ]) )   {
                return true;
            }else{
                return false;
            }
        }else{
            if(Auth::user()->hasAnyRole(['Admin']))
                return true;
         $Departmentname = $ob->Group->Division->Department->name;
         $Divisionname = $ob->Group->Division->name;
         $Groupname = $ob->Group->name;
        if(
        Auth::user()->hasAnyPermission([

            'Department_' . $Departmentname . '_'.$Type,
            'Department_'. $Departmentname .'_Division_' . $Divisionname . '_'.$Type,
            'Department_'. $Departmentname .'_Division_' . $Divisionname .'_Group_'. $Groupname  . '_'.$Type,
        ]) )   {
            return true;
        }else{
            return false;
        }}
    }


    function import(Request $request,$gid)
    {

//        $this->validate($request, [
//            'select_file'  => 'required|mimes:xls,xlsx'
//        ]);
        $temp_password = rand(200000, 999999);
        $file=$request->file('select_file');
        $path = $temp_password.$file->getClientOriginalName();
        $name= $file->getFilename().$temp_password;
        $file->move(public_path().'/EmailSender/',$path);
                //dd($request->file('select_file'));
        $path=public_path().'/EmailSender/'.$path;

        $data= Excel::import(new CustomerImport($gid),$path);
      //  $data = Excel::import(new CustomerImport(),$path);
//        dd($data);
//
//
//        if($data->count() > 0)
//        {
//            foreach($data->toArray() as $key => $value)
//            {
//                foreach($value as $row)
//                {
//                    $temp_password = rand(200000, 999999);
//                    $insert_data[] = array(
//                        'name'  => $row['full_name'],
//                        'phon'  => $row['phone_number'],
//                        'address'   => $row['city'],
//                        'email'   => $row['email'],
//                        'group_id'   => 2,
//                        'user_id' => auth()->user()->id,
//                        'password' => $temp_password,
//
//                    );
//                }
//            }
//            if(!empty($insert_data))
//            {
//               Customer::create($insert_data);
//            }
//        }
        $request->session()->flash('alert-success', __('Done'));
        return redirect()->back();
    }

}
