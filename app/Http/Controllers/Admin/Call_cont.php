<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\Fileowner;
use App\Model\Group;
use App\Model\Invoice;
use App\Model\Not;
use App\Model\Notetype;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Spatie\Permission\Models\Role;

class Call_cont extends Controller
{
    public function call(Request $request, $id)
    {
        $Customers = Customer::where('group_id', $id)->get();
        $arr['Customers'] = $Customers;
        $arr['gname'] = Group::find($id)->name;

        return view('layouts.CallCenter_app', $arr);
    }

    public function getcuinfo(Request $request)
    {
        //return 'dfvsrfg';
        $id = $request->input('id');

        $customer = Customer::find($id);
        $arr['Customers'] = $customer;
        $files = Fileowner::where('customer_id', $id)->get();
        $arr['files'] = $files;
        $total = Invoice::where('customer_id', $id)->where('status','<>', 'canceled')->sum('total');
        $pamnt = Invoice::where('customer_id', $id)->where('status','<>', 'canceled')->sum('pamnt');
        $arr['total'] = $total;
        $arr['pamnt'] = $pamnt;
        $tasktotal = Task::where('customer_id', $id)->get();
        $arr['tasktotal'] = count($tasktotal);
        $taskcompleted = Task::where('customer_id', $id)->where('state_id', '<>', 5)->get();
        $arr['taskcompleted'] = count($taskcompleted);
        $arr['tasknoncompleted'] = count($tasktotal) - count($taskcompleted);
//dd('d='.count($tasktotal).'<br>taskcompleted='.count($taskcompleted));
        return view('info.callcentercustomerinfo', $arr);
    }

    public function getinviceinfo(Request $request)
    {
        $id = $request->input('id');
        //dd($id);
        $invoices = Invoice::where('customer_id', $id)->get();
        $arr['invoices'] = $invoices;
        return view('info.invoiceinfo', $arr);
    }

    public function getinfo(Request $request)
    {
        $id = $request->input('id');
        $customer = Customer::find($id);
        $arr['Customers'] = $customer;
        $files = Fileowner::where('customer_id', $id)->get();
        $arr['files'] = $files;
        return view('info.cuinfo', $arr);
    }

    public function gettaskinfo(Request $request)
    {
        $id = $request->input('id');

        $tasks = Task::where('customer_id', $id)->get();
        $arr['Tasks'] = $tasks;
        return view('info.taskinfo', $arr);
    }


    public function getnotinfo(Request $request)
    {
        $id = $request->input('id');
        $customer = Customer::find($id);
        $arr['customer'] = $customer;
        return view('info.cunots', $arr);
    }

    public function getupdateinfo(Request $request)
    {
        $id = $request->input('id');
        $customer = Customer::find($id);
        $arr['customer'] = $customer;
        $arr['groups'] = Group::all();
        $arr['roles'] = Role::where('guard_name','customer')->get();
        return view('info.update', $arr);
    }
    public function getupdatesaveinfo(Request $request)
    {
        $id = $request->input('id');
        $customer=Customer::find($id);
        $group_id = $request->input('group_id');
        $rolename = $request->input('rolename');
        if($rolename !='') {
            $customer->syncRoles([$rolename]);
        }
        $customer->update([
            'group_id' => $group_id,
        ]);
        return 'sucsess';
    }
    public function noteadd(Request $request)
    {
        $id = $request->input('id');
        $notetype_id = $request->input('notetype_id');
        $content = $request->input('content');
       Not::create([
           'user_id' =>Auth::user()->id,
           'notetype_id'=>$notetype_id,
           'customer_id'=>$id,
           'content'=> $content,
       ]);


        return 'sucsess';
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $Note = Not::find($id);
        $Note->update($request->all());
        return 'sucsses';
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $Note = Not::find($id);
        $Note->delete();
        return 'sucsses';
    }

    public function add(Request $request)
    {
        $content = $request->input('content');
        $nottype_id = $request->input('nottype_id');
        $id = $request->input('id');
        $note = Not::create(
            [
                'user_id' => auth()->user()->id,
                'customer_id' => $id,
                'notetype_id' => $nottype_id,
                'content' => $content
            ]);
        return '<div id="D_' . $note->id . '" class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->
                <div class="col-sm-11">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <strong>' . $note->User->name . '</strong> <span style="margin-left: 6%;" class="text-muted">' . $note->created_at . '</span>
           
                                    <span style="margin-left: 12%;">
                         <a style="margin-left: 22%;color: green" onclick="updatnote(' . $note->id . ')">Edite</a>
                        <a style="margin-left: 5%;color: red" onclick="deletnot(' . $note->id . ' )">Delete</a>
                                    </span>
                        </div>
                     
                            <div id="UP_' . $note->id . '" class=" memo  panel-body">
                                ' . $note->content . '
                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div><!-- /col-sm-5 -->
            </div>';
    }

    public function addnottype(Request $request){
        $typename = $request->input('typename');

        $note = Notetype::create(
            [
                'typename' => $typename,
            ]);
        return '<option value="'.$note->id.'">'.$typename.'</option>';
    }
    public function cufollow(Request $request){
     // return 'ferff';
        $id = $request->input('id');
       // return $id;
        $customer = Customer::find($id);
        //return $id;
        $note = $customer->update([
                'follow_by' => Auth::user()->id,
            ]);
        return $id;
    }
    public function cuunfollow(Request $request){

        $id = $request->input('id');
      //  return $id;
        $customer = Customer::find($id);
        //return $id;
        $note = $customer->update([
                'follow_by' => null,
            ]);
        return $id;
    }
}
