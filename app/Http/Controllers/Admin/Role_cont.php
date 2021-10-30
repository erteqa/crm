<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Role_cont extends Controller
{
    public function add(Request $request,$type)
    {
        if($type=='U') {
            $guard='web';
        }else{
            $guard='customer';
        }
        if($request->isMethod('post')) {
            $input=$request->all();
         //   dd($input['permission_id']);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name'
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }

            $permission=$input['permission_id'];
            $role= Role::create(['name'=>$input['name'],'guard_name'=>$guard]);
          // $role=Role::findById($id);
            $role->syncPermissions($permission);
          //  $permission->syncRoles($role);
            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{
            $Permissions=Permission::where('guard_name',$guard)->get();
            $arr['Permissions']=$Permissions;
           // dd($Permissions);
            return view('Crm.Role.Add_view',$arr);
        }
    }
    public function index($type)
    {
        if($type=='U') {
            $guard='web';
        }else{
            $guard='customer';
        }
        $Roles=Role::where('guard_name',$guard)->get();
        $arr['Roles']= $Roles;
        $arr['type']=$type;
        return view('Crm.Role.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Role=Role::find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Role->delete();

        return redirect()->back();
        //   }

    }
    public function update(Request $request, $id,$type)
    {
        if($type=='U') {
            $guard='web';
        }else{
            $guard='customer';
        }
        $Role =Role::find($id);
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                Rule::unique('roles')->ignore($Role->id),
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }
            $input=$request->all();
            //   dd($input['permission_id']);
            $permission=$input['permission_id'];
            //dd($permission);
            $Role->syncPermissions($permission);
            $Role->update(['name'=>$input['name']]);
            $request->session()->flash('alert-success', __('User was successful Update!')  );
            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);
            $arr['Role']=$Role;
            $Permissions=Permission::where('guard_name',$guard)->get();
           // dd($Permissions);
//            $Permissions=$Role->getAllPermissions();
            //dd($Role->hasPermissionTo(105));
            $arr['Permissions']=$Permissions;
            $arr['type']=$type;
            return view('Crm.Role.Update_view', $arr);
        }

    }
}
