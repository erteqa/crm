<?php

namespace App\Http\Controllers\Admin;

use App\Model\TaskType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TaskType_cont extends Controller
{

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();
            // dd($input);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:task_types|max:255',
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists') );
                return redirect()->back();
            }
                TaskType::create($input);


            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{

            return view('Crm.TaskType.Add_view');
        }
    }
    public function addajax(Request $request)
    {
            $name=$request->input('name');
           //  return $name;
//         $task= TaskType::where('name',$name)->get();
//            if(count($task)!=0)
//                return null;

            $task = TaskType::create([
                    'name' =>$name,
                ]);
$dd='<option  value="'.$task->id.'" selected="selected">'.$task->name.'</option>';

            return $dd;

    }
    public function index()
    {
        //$TaskTypes=TaskType::all();
        $TaskTypes=TaskType::withTrashed()->get();
        $arr['TaskTypes']= $TaskTypes;
        return view('Crm.TaskType.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();
        $TaskType=TaskType::find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $TaskType->delete();

        return redirect()->back();
        //   }

    }
    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $TaskType=TaskType::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $TaskType->forceDelete();
        return redirect()->back();
        //   }

    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $TaskType=TaskType::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $TaskType->restore();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id)
    {
        $TaskType =TaskType::find($id);

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
            $TaskType->update($request->all());
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $arr['TaskType']=$TaskType;

            return view('Crm.TaskType.Update_view', $arr);
        }

    }
}
