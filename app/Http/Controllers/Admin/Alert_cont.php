<?php

namespace App\Http\Controllers\Admin;

use App\Model\Msgafter;
use App\Model\Msgbefore;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Alert_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input=$request->all();
            $input['addby']=Auth::user()->id;
            Msgbefore::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            $users = User::all();
            $arr['users'] = $users;
            return view('Crm.Alert.Add_view', $arr);
        }
    }
    public function index($type)
    {
        $user = Auth::user();
        if ($type == 'B') {
            $Alerts = Msgbefore::where('addby', $user->id)->get();
            $arr['Alerts'] = $Alerts;
            return view('Crm.Alert.IndexB_view', $arr);
        } else {
            $Alerts = Msgafter::where('user_id', $user->id)->get();
            $arr['Alerts'] = $Alerts;
            return view('Crm.Alert.IndexA_view', $arr);
        }

    }
    public function delete(Request $request, $id, $type)
    {
        if ($type == 'B')
            $Alert = Msgbefore::find($id);
        else
            $Alert = Msgafter::find($id);
        if($Alert->user_id==Auth::user()->id ||$Alert->addby==Auth::user()->id ) {
            $Alert->delete();
            $request->session()->flash('alert-success', __('User was successful added!'));
        } else
        {$request->session()->flash('alert-danger', __('cant'));}

        return redirect(route('Dashboard'));
    }
    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Alert = Alert::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Alert->forceDelete();
        return redirect()->back();
        //   }

    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Alert = Alert::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Alert->restore();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id)
    {
        $Alert = Alert::find($id);

        if ($request->isMethod('post')) {
//            $Employee->name=$request->input('name');
//            if (is_null($request->input('admin')) or $request->input('admin') != $section->admin) {
//                if(!is_null($section->admin))
//                {
//                    $old_admin = User::find($section->admin);
//                    $old_admin->role = 'user';
//                    $old_admin->update();
//                }
//                $section->admin = $request->input('admin');
//                if (!is_null($request->input('admin'))) {
//                    $admin = User::find($request->input('admin'));
//                    $admin->role = 'editor';
//                    $admin->update();
//                }
//            }
            $Alert->update($request->all());
            return redirect()->back();
        } else {
            $Employees = User::all();
            $arr['employees'] = $Employees;
            $statuss = State::all();
            $arr['status'] = $statuss;
            $customers = Customer::all();
            $arr['customers'] = $customers;
            $arr['Alert'] = $Alert;
            return view('Crm.Alert.Update_view', $arr);
        }

    }
    public function view(Request $request, $id, $type)
    {
        if ($type == 'A') {
            $Alert = Msgafter::find($id);
            $arr['Alert'] = $Alert;
            return view('Crm.Alert.View_view', $arr);
        } else {
            $Alert = Msgbefore::find($id);
            $arr['Alert'] = $Alert;
            return view('Crm.Alert.View_view', $arr);
        }
    }

}
