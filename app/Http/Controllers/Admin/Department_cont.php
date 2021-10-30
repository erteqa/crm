<?php

namespace App\Http\Controllers\Admin;

use App\Model\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class Department_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            // dd($input);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:departments|max:255',
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }
            Department::create($input);
            $pers = [
                ['name' => 'Department_' . $input['name'] . '_Add'],


                ['name' => 'Department_' . $input['name'] . '_Update'],
                ['name' => 'Department_' . $input['name'] . '_Delete'],

                ['name' => 'Department_' . $input['name'] . '_ForceDelete'],
                ['name' => 'Department_' . $input['name'] . '_View'],
            ];

            foreach ($pers as $per) {

                Permission::create(['name' => $per['name']]);
            }
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {

            return view('Crm.Department.Add_view');
        }
    }

    public function index()
    {
        //$Departments=Department::all();
        $Departments = Department::withTrashed()->get();
        $arr['departments'] = $Departments;
        return view('Crm.Department.Index_view', $arr);
    }

    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();'%' . Input::get('name') . '%'
        $department = Department::find($id);

        $department->delete();
        return redirect()->back();
        //   }

    }

    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Department = Department::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $permissions = Permission::where('name', 'like', '%Department' . '_' . $Department->name . '_%')->get();
        foreach ($permissions as $permission) {
            $permission->delete();
        }

        $Department->forceDelete();
        return redirect()->back();
        //   }

    }

    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Department = Department::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Department->restore();

        return redirect()->back();
        //   }

    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);

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
            $department->update($request->all());
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $arr['department'] = $department;

            return view('Crm.Department.Update_view', $arr);
        }

    }
    public static function permision( $ob,$Type)
    {

        if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission([
                'Department_' . $ob->name  . '_'.$Type,


            ]) )   {
            return true;
        }else{
            return false;
        }
    }
}
