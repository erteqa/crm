<?php

namespace App\Http\Controllers\Customer;

use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Task_cont extends Controller
{
    public function view(Request $request, $id)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $Task = Task::find($id);
        if ($request->isMethod('post')) {
            $input=$request->only(['memo_customer']);

            $Task->update($input);
            $request->session()->flash('alert-success', __('lang.message_has_send'));
            return redirect()->back();
        }else{
            $arr['Task'] = $Task;
            return view('Customer.Task.View_view', $arr);
        }
    }
    public function index()
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user =auth()->guard('customer')->user();

        $Tasks = Task::where('customer_id', $user->id)->get();

        $arr['Tasks'] = $Tasks;
        return view('Customer.Task.Index_view', $arr);
    }

}
