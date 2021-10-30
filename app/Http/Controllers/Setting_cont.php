<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Customer;
use App\Model\Fileowner;
use App\Model\Group;
use App\Model\Mail;
use App\Notifications\Addcunot;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use Spatie\Permission\Models\Permission;

class Setting_cont extends Controller
{
    public function companyindex(Request $request)
    {
        $Company=Company::find(1);
        if ($request->isMethod('post')) {
            $Company->update($request->all());
            $request->session()->flash('alert-success', __('Done'));
            return redirect()->back();
        } else {

            $arr['company']=$Company;
            return view('settings.company.company_view',$arr);
        }
    }
    public function mailindex(Request $request)
    {
        $email=Mail::find(1);
        if ($request->isMethod('post')) {
            $email->update($request->all());
            $request->session()->flash('alert-success', __('Done'));
            return redirect()->back();
        } else {
            $arr['email']=$email;
            return view('settings.email.email_view',$arr);
        }
    }
    public function sendemail(Request $request, $passporN, $sconcirN, $cirtifcateN, $personalN,$YOS=null,$SAT=null)
    {
        $un=$request->all();
       require '../vendor/autoload.php';
            $name=$request->input('firstname');
            $email=$request->input("email");
            $nekedname=$request->input('nekedname');
            $subject=$name.' '.$nekedname;
            $body='<body style="text-align: right;float: right">
<div id="wrapper">
    <h1>استمارة قبول جامعي</h1>
    <form method="post" enctype="multipart/form-data">
            <div class="col-2">
                <label>
                    <span style="font-weight: bold;font-size: large">رقم الباسبور</span>
                    <input  type="text" placeholder="ادخل  رقم الباسبور" id="passport" value="'.$un['passport'].'" tabindex="1" readonly>
                </label>
            </div>
<br>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">الاسم الاول</span>
                <input placeholder="الاسم الاول" id="firstname"  type="text" value="'.$un['firstname'].'" tabindex="3" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">اسم الاب</span>
                <input placeholder="الاسم الاب" id="fathername" value="'.$un['fathername'].'" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">اسم الام</span>
                <input placeholder="الاسم الام" id="mothername" value="'.$un['mothername'].'" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-4">
            <label>
                 <span style="font-weight: bold;font-size: large">الكنية</span>
                <input placeholder="الكنية" id="nekedname" value="'.$un['nekedname'].'" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">البريد الإلكتروني</span>
                <input placeholder="البريد الإلكتروني" type="email" id="email" value="'.$un['email'].'" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">الجنسية</span>
                <input placeholder="الجنسية" id="nathnality" value="'.$un['nathnality'].'" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">تاريخ الولادة</span>
                <input placeholder="تاريخ الولادة"  type="text" id="borndate" value="'.$un['borndate'].'" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">العنوان</span>
                <input placeholder="العنوان"  type="text" id="address" value="'.$un['address'].'" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                 <span style="font-weight: bold;font-size: large">رقم الهاتف</span>
                <input placeholder="رقم الهاتف"  type="text" id="phone" value="'.$un['phone'].'" tabindex="6" readonly>
            </label>
        </div>


        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">المعدل</span>
                <input placeholder="المعدل" id="avarage" value="'.$un['avarage'].'" tabindex="4" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">الفرع</span>
                <input placeholder="الفرع" id="depart" value="'.$un['depart'].'" tabindex="4" readonly>
            </label>
        </div>

        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">المدرسة</span>
                <input placeholder="المدرسة" id="school" value="'.$un['school'].'" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-3">
            <label>
                 <span style="font-weight: bold;font-size: large">تاريخ اصدار الشهادة</span>
                <input placeholder="المدرسة" id="school" value="'.$un['cirstart'].'" tabindex="6" readonly>
            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large">التخصصات المطلوبة</span>
                <input placeholder="التخصص الاول" id="sp" value="'.$un['sp'][0].'" tabindex="6">
                <input placeholder="التخصص الثاني" id="sp" value="'.$un['sp'][1].'" tabindex="6">
                <input placeholder="التخصص الثالث" id="sp" value="'.$un['sp'][2].'" tabindex="6">
            </label>
        </div>

        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large ">التسجيل في</span>

                <input  id="school" value="'.$un['drgree'].'" tabindex="6" readonly>
            </label>
        </div>
        <div class="col-2">
            <label>
                <span style="font-weight: bold;font-size: large ">الجنس</span>

                <input  id="school" value="'.__('lang.'.$un['gender']).'" tabindex="6" readonly>
            </label>
        </div>
    </form>
</div>
</body>';
            $message=$body;
        $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host ='mail.eritqaa.org'; //'mail.eritqaa.net';
            $mail->Username = 'noreply@eritqaa.org';//'noreply@eritqaa.net';
            $mail->Password = 'Noreply1234_';//'Noreply1234_';
            $mail->From = 'noreply@eritqaa.org';
            $mail->FromName = 'Eritqaa';
    //$mail->AddAddress('erteqa.low@gmail.com',$name);
   $mail->AddAddress('studentservices@eritqaa.com',$name);

            $mail->Subject =$subject;
            $mail->Body =$message.'<br>';
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $str1= "gmail.com";
            $str2=strtolower('mail.eritqaa.org');
        if(!is_null($passporN))
        {
            $mail->addAttachment(public_path().'/Files/'.$passporN);
        }
        if(!is_null($YOS))
        {
            $mail->addAttachment(public_path().'/Files/'.$YOS);
        }
        if(!is_null($SAT))
        {
            $mail->addAttachment(public_path().'/Files/'.$SAT);
        }
        if(!is_null($sconcirN))
        {
            $mail->addAttachment(public_path().'/Files/'.$sconcirN);
        }
        if(!is_null($cirtifcateN))
        {
            $mail->addAttachment(public_path().'/Files/'.$cirtifcateN);
        }
        if(!is_null($personalN))
        {
            $mail->addAttachment(public_path().'/Files/'.$personalN);
        }
            If(strstr($str2,$str1))
            {
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('تم التسجيل بنجاح'));
                }
                else {
                    $request->session()->flash('alert-danger', __('invoices Number existed'));
                }
            }
            else{
                $mail->Port = 25;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('تم التسجيل بنجاح'));
                    return redirect()->back();
                }
                else {
                    $request->session()->flash('alert-danger', $mail->ErrorInfo);
                    return redirect()->back();
                }
            }
    }
    public function univ(Request $request,$uid=3,$gid=5){
        if ($request->isMethod('post')) {
            $input=$request->all();
           // dd($input['email']);
            if ($input['email']!=null) {
                $passporN=null;
                $sconcirN=null;
                $cirtifcateN=null;
                $personalN=null;
                $YOS=null;
                $SAT=null;
                $customer=Customer::where('email',$input['email'])->where('group_id',5)->get();
                //dd(count($customer));
                if(count($customer)==0){
                    $temp_password = rand(200000, 999999);
                    $input['password']=Hash::make($temp_password);
                    $customer =Customer::create([
                        'email'=> $input['email'],
                        'name'=>$input['firstname'].' '.$input['nekedname'],
                        'phone'=>$input['phone'],
                        'address'=>$input['address'],

                        'company'=>$input['drgree'],
                        'taxid'=>$input['sp'][0].'+'.$input['sp'][1].'+'.$input['sp'][2],
                        'company_taxid'=>$input['school'],
                        'record_number'=>$input['avarage'],
                        'mersis_number'=>$input['depart'],
                        'Tc' => $input['borndate'],
                        'group_id'=>$gid,
                        'user_id'=>$uid,
                        'nationality'=>$input['nathnality'],
                        'passport_number'=>$input['passport'],
                        'password'=>$input['password'],
                    ]);
                    if($customer){
                     //   $user=User::where('id',1)->orWhere('id',6)->orWhere('id',10)->orWhere('id',3)->get();
                        $users = \App\User::permission(['Department_الجامعات_Division_حكومي_Group_طلبات القبول الجامعي_View','Department_الجامعات_View','Department_الجامعات_Division_حكومي_View'])->OrWhere('id',1)->get();

                        Notification::send($users,new Addcunot($customer));
                    }
                    $file=$request->file('passpor');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        // dd(public_path());
                        $file->move(public_path().'/Files/',$rand);
                        $passporN=$rand;
                        $dd=Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                        // $filename = $file->store('Files');
                        //dd($dd->id);
                    }
                    $file=$request->file('sconcir');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        // dd(public_path());
                        $file->move(public_path().'/Files/',$rand);
                        // $filename = $file->store('Files');
                        $sconcirN=$rand;
                        Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                    }
                    $file=$request->file('cirtifcate');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Files/',$rand);
                        $cirtifcateN=$rand;
                        Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                    }
                    $file=$request->file('personal');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Files/',$rand);
                        $personalN=$rand;
                        Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                    }
                    $file=$request->file('SAT');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Files/',$rand);
                        $SAT=$rand;
                        Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                    }
                    $file=$request->file('YOS');
                    if(!is_null($file)){
                        $name= $file->getClientOriginalName();
                        $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Files/',$rand);
                        $YOS=$rand;
                        Fileowner::create([
                            'customer_id' => $customer->id,
                            'name' => $name,
                            'path' =>$rand,
                        ]);
                    }
                }else{
                    $request->session()->flash('alert-success', __('انت مسجل مسبقا شكرا لتواصلكم معنا'));
                    return redirect()->back();
                }
            }
            $this->sendemail($request,$passporN, $sconcirN, $cirtifcateN, $personalN,$YOS,$SAT);
            return redirect()->back();
        }else{
            return view('Univer.uni');
        }
    }
    public function academyform(Request $request,$id=1,$gid=4){
        if ($request->isMethod('post')) {
            $input=$request->all();
         //   dd($id.' '.$gid);
            $user=User::find($id);
            $group=Group::find($gid);
            if(!$user){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if(!$group){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if ($input['email']!=null)
            {
                $validator = Validator::make($request->all(), [
                    'email' => 'unique:customers,email,NULL,id,group_id,'.$gid
                ]);
                if ($validator->fails()) {
                    $request->session()->flash('alert-danger', __('lang.The_Email_exists'));
                    return redirect()->back();
                }
            }
            $input['name']=$input['firstname'].' '.$input['fathername'].' '.$input['nekedname'];
            $input['user_id']=$id;
            $input['group_id']=$gid;

            $temp_password = rand(200000, 999999);
            $input['password']=Hash::make($temp_password);
            $customer= Customer::create($input);
            if($customer){
                $users = \App\User::permission(['Department_الاكاديمية_Division_دورات التسويق_Group_facebook ads_View','Department_الاكاديمية_View','Department_الاكاديمية_Division_دورات التسويق_Group_facebook ads_View'])->OrWhere('id',1)->get();
              //  $user=User::where('id',1)->orWhere('id',$id)->get();

                Notification::sendNow($users,new Addcunot($customer));

            }


            $file=$request->file('personal');
            if(!is_null($file)){
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
            $files=$request->file('Previous_certificates');
            if(!is_null($files)){
                foreach ($request->file('Previous_certificates') as $file) {
                   // dd($request->file('Previous_certificates'));
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
                }}
//dd($input);
            $request->session()->flash('alert-success', __('تم التسجيل بنجاح'));
            return redirect()->back();

        }else{
            return view('Academy.ReForm.uni');
        }
    }
    public function Pruniver(Request $request,$id=1,$gid=11){
        if ($request->isMethod('post')) {
            $input=$request->all();
         //   dd($id.' '.$gid);
            $user=User::find($id);
            $group=Group::find($gid);
            if(!$user){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if(!$group){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if ($input['email']!=null)
            {
                $validator = Validator::make($request->all(), [
                    'email' => 'unique:customers,email,NULL,id,group_id,'.$gid
                ]);
                if ($validator->fails()) {
                    $request->session()->flash('alert-danger', __('lang.The_Email_exists'));
                    return redirect()->back();
                }
            }
            $input['name']=$input['firstname'].' '.$input['nekedname'];
            $input['user_id']=$id;
            $input['group_id']=$gid;
            $input['taxid']=$input['sp'][0].'+'.$input['sp'][1].'+'.$input['sp'][2];
            $temp_password = rand(200000, 999999);
            $input['password']=Hash::make($temp_password);
            $customer= Customer::create($input);
            if($customer){
                //  $user=User::where('id',1)->orWhere('id',$id)->get();
                $koko='Department_الجامعات_Division_خاص_Group_طلبات القبول الجامعي  خاص افتراضي_View';
                $users = \App\User::permission([$koko,'Department_الجامعات_Division_خاص_View','Department_الجامعات_View'])->OrWhere('id',1)->get();

                Notification::sendNow($users,new Addcunot($customer));

            }

            $request->session()->flash('alert-success', __('تم التسجيل بنجاح'));
            return redirect()->back();

        }else{
            return view('Univer.puniv');
        }
    }
    public function Compcreate(Request $request,$id=1,$gid=10){
        if ($request->isMethod('post')) {
            $input=$request->all();
         //   dd($id.' '.$gid);
            $user=User::find($id);
            $group=Group::find($gid);
            if(!$user){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if(!$group){
                $request->session()->flash('alert-danger', __('lang.problem_rej'));
                return redirect()->back();
            }
            if ($input['email']!=null)
            {
                $validator = Validator::make($request->all(), [
                    'email' => 'unique:customers,email,NULL,id,group_id,'.$gid
                ]);
                if ($validator->fails()) {
                    $request->session()->flash('alert-danger', __('lang.The_Email_exists'));
                    return redirect()->back();
                }
            }
            $input['name']=$input['firstname'].' '.$input['nekedname'];
            $input['user_id']=$id;
            $input['group_id']=$gid;
            $input['taxid']=$input['sp'];
            $input['taxid']=$input['sp'];
            $temp_password = rand(200000, 999999);
            $input['password']=Hash::make($temp_password);
            $customer= Customer::create($input);
            if($customer){
                //  $user=User::where('id',1)->orWhere('id',$id)->orWhere('id',6)->orWhere('id',10)->get();
                $users = \App\User::permission(['Department_تأسيس الشركات_Division_التاسيس_Group_تأسيس افنراضي_View','Department_تأسيس الشركات_Division_التاسيس_View','Department_تأسيس الشركات_View'])->OrWhere('id',1)->get();

                Notification::sendNow($users,new Addcunot($customer));

            }

            $request->session()->flash('alert-success', __('تم التسجيل بنجاح'));
            return redirect()->back();

        }else{
            return view('Univer.compcreate');
        }
    }


}
