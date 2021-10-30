<?php

namespace App\Http\Controllers\Admin;

use App\Model\Department;
use App\Model\Division;
use App\Model\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class Group_cont extends Controller
{
    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:groups,name,NULL,id,division_id,'.$input['division_id']
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }

            $Gro= Group::create($input);
            $pers = [
                ['name' => 'Department_'.$Gro->Division->Department->name.'_Division_' .$Gro->Division->name .'_Group_'.$input['name'] . '_Add'],
                ['name' => 'Department_'.$Gro->Division->Department->name.'_Division_' .$Gro->Division->name .'_Group_'.$input['name'] . '_Update'],
                ['name' => 'Department_'.$Gro->Division->Department->name.'_Division_' .$Gro->Division->name .'_Group_'.$input['name'] . '_Delete'],
                ['name' => 'Department_'.$Gro->Division->Department->name.'_Division_' .$Gro->Division->name .'_Group_'.$input['name'] . '_ForceDelete'],
                ['name' => 'Department_'.$Gro->Division->Department->name.'_Division_' .$Gro->Division->name .'_Group_'.$input['name'] . '_View'],
            ];

            foreach ($pers as $per) {

                Permission::create(['name' => $per['name']]);
            }
            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{
            $Division=Division::all();
            $arr['Divisions']=$Division;
            return view('Crm.Group.Add_view',$arr);
        }
    }
    public function index()
    {
        $Groups=Group::withTrashed()->get();
        $arr['groups']= $Groups;
        $Division=Division::all();
        $arr['Divisions']=$Division;
        return view('Crm.Group.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Group=Group::find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Group->delete();

        return redirect()->back();
        //   }

    }
    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Group=Group::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Group->forceDelete();
        return redirect()->back();
        //   }

    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Group=Group::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Group->restore();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id)
    {
        $Group =Group::find($id);

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
          //  dd($request->all());
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:groups,name,NULL,id,department_id,'.$Group->Department->id
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }
            $Group->update($request->all());
            $request->session()->flash('alert-success', __('User was successful Update!') );
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);

            $arr['group']=$Group;
            $Division=Division::all();
            $arr['Divisions']=$Division;

            return view('Crm.Group.Update_view', $arr);
        }

    }
    public function view(Request $request, $id)
    {
        $user=Auth::user();
        $Group = Group::find($id);
        if($user->hasAnyPermission(['Only_My_Customers']))
            $arr['customers']=Customer::where('user_id',$user->id)->where('group_id',$id)->get();
        else
        $arr['customers'] = $Group->Customer;

        $arr['gid'] = $id;
        return view('Crm.Group.View_view', $arr);
    }
    public static function permision( $ob,$Type)
    {
        if(Auth::user()->hasAnyRole(['Admin']) )
            return true;
        $Departmentname = $ob->Division->Department->name;
        $Divisionname = $ob->Division->name;
        $Groupname = $ob->name;
        if(
            Auth::user()->hasAnyPermission([
                'Department_' . $Departmentname  . '_'.$Type,
                'Department_'.$Departmentname .'_Division_' . $Divisionname . '_'.$Type,
                'Department_'. $Departmentname .'_Division_' . $Divisionname .'_Group_'. $Groupname  . '_'.$Type,
            ]) )   {
            return true;
        }else{
            return false;
        }
    }
}
