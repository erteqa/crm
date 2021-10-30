<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\State;
use App\Model\Task;
use App\Model\TaskType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class Task_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $input['addby']=Auth::user()->id;
            // dd($input);
            $input['Department_id']=Customer::find($input['customer_id'])->Group->Division->Department->id;
            //dd($input['Department_id']);
            Task::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            $TaskTypes = TaskType::all();
            $arr['tasktyps'] = $TaskTypes;
            $Employees = User::all();
            $arr['employees'] = $Employees;
            $statuss = State::all();
            $arr['status'] = $statuss;
            $customers = Customer::all();
            $arr['customers'] = $customers;
            return view('Crm.Task.Add_view', $arr);
        }
    }

    public function index($type)
    {
        $user = Auth::user();
        if($type=='P') {
            if(Auth::user()->hasAnyRole(['Admin']) ){
                $Tasks = Task::all();
            }else
            $Tasks = Task::where('addby', $user->id)->get();
        }
        elseif ($type=='P_Del'){
            $Tasks = Task::where('addby', $user->id)->onlyTrashed()->get();
        } else {
            $Tasks = Task::where('user_id', $user->id)->get();
        }
        $arr['Tasks'] = $Tasks;
        return view('Crm.Task.Index_view', $arr);
    }

    public function delete(Request $request, $id)
    {
        $Task = Task::find($id);
        $Task->delete();
        return redirect()->back();
    }

    public function forcedelete(Request $request, $id)
    {

        $Task = Task::onlyTrashed()->find($id);
        $Task->forceDelete();
        return redirect()->back();


    }

    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Task = Task::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Task->restore();

        return redirect()->back();
        //   }

    }

    public function update(Request $request, $id)
    {
        $Task = Task::find($id);
        if ($request->isMethod('post')) {

            $Task->update($request->all());
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $Employees = User::all();
            $arr['employees'] = $Employees;
            $statuss = State::all();
            $arr['status'] = $statuss;
            $customers = Customer::all();
            $Tasktypes=TaskType::all();
            $arr['customers'] = $customers;
            $arr['Task'] = $Task;
            $arr['Tasktypes'] = $Tasktypes;
            return view('Crm.Task.Update_view', $arr);
        }

    }

    public function view(Request $request, $id)
    {
        $Task = Task::find($id);
        if ($request->isMethod('post')) {
            $input=$request->only(['state_id','memouser','user_id']);
            $Task->state_id =$input['state_id'] ;
            $Task->memo_user =json_encode($input['memouser']) ;
            $Task->user_id=$input['user_id'];
            $Task->update();
            return redirect()->back();
        }else{
            $Employees = User::all();
            $arr['employees'] = $Employees;
            $arr['Task'] = $Task;
            $status=State::all();
            $arr['status']=$status;
            return view('Crm.Task.View_view', $arr);
        }
    }


}
