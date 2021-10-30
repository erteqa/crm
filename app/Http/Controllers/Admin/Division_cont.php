<?php

namespace App\Http\Controllers\Admin;

use App\Model\Department;
use App\Model\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class Division_cont extends Controller
{
    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();

            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:divisions,name,NULL,id,department_id,'.$input['department_id']
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }
           $Dev=Division::create($input);
            $pers = [
                ['name' => 'Department_'.$Dev->Department->name.'_Division_' . $input['name'] . '_Add'],
                ['name' => 'Department_'.$Dev->Department->name.'_Division_' . $input['name'] . '_Update'],
                ['name' => 'Department_'.$Dev->Department->name.'_Division_' . $input['name'] . '_Delete'],
                ['name' => 'Department_'.$Dev->Department->name.'_Division_' . $input['name'] . '_ForceDelete'],
                ['name' => 'Department_'.$Dev->Department->name.'_Division_' . $input['name'] . '_View'],
            ];

            foreach ($pers as $per) {

                Permission::create(['name' => $per['name']]);
            }
            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{
            $Departments=Department::all();
            $arr['departments']=$Departments;
            return view('Crm.Division.Add_view',$arr);
        }
    }
    public function index()
    {
        //$Divisions=Division::all();
        $Divisions=Division::withTrashed()->get();
        $arr['Divisions']= $Divisions;
        $Departments=Department::all();
        $arr['departments']=$Departments;
        return view('Crm.Division.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {

        $Division=Division::find($id);

        $Division->delete();

        return redirect()->back();
        //   }

    }
    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Division=Division::onlyTrashed()->find($id);
        $permissions = Permission::where('name', 'like', '%Department'.$Division->Department->name.'Division_'. $Division->name . '_%')->get();
      //  dd($permissions);
        foreach ($permissions as $permission) {
            $permission->delete();
        }
        $Division->forceDelete();
        return redirect()->back();
        //   }

    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Division=Division::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Division->restore();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id)
    {
        $Division =Division::find($id);

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
            $Division->update($request->all());
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $arr['Divisions']=$Division;
            $Departments=Department::all();
            $arr['departments']=$Departments;
            $arr['division']=$Division;
            return view('Crm.Division.Update_view', $arr);
        }

    }
    public function view(Request $request, $id)
    {
        $Division = Division::find($id);
        $arr['employees'] = $Division->User;
        return view('Crm.Division.View_view', $arr);
    }
    public static function permision( $ob,$Type)
    {

        if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission([
                'Department_' . $ob->Department->name  . '_'.$Type,
                'Department_'.$ob->Department->name .'_Division_' . $ob->name . '_'.$Type,

            ]) )   {
            return true;
        }else{
            return false;
        }
    }
}
