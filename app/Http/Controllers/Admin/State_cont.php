<?php

namespace App\Http\Controllers\Admin;

use App\Model\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class State_cont extends Controller
{
    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();
            // dd($input);
            State::create($input);
            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{

            return view('Crm.State.Add_view');
        }
    }
    public function index()
    {
        //$States=State::all();
        $States=State::withTrashed()->get();
        $arr['States']= $States;
        return view('Crm.State.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();
        $State=State::find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $State->delete();

        return redirect()->back();
        //   }

    }
    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $State=State::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $State->forceDelete();
        return redirect()->back();
        //   }

    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $State=State::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $State->restore();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id)
    {
        $State =State::find($id);

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
            $State->update($request->all());
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $arr['State']=$State;

            return view('Crm.State.Update_view', $arr);
        }

    }
}
