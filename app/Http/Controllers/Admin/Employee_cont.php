<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\Department;
use App\Model\Division;
use App\Model\Rolew;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class Employee_cont extends Controller
{
    public function processSetIsActive(Request $request,$id, $value)
    {
        $employee = User::find($id);
        if(!self::permision($employee,'Update')){
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
        $employee->isactive = $value;
        $employee->update();
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $user=Auth::user();
        if(!self::permision($user,'Add')){
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            // dd($request->all());
            $input = $request->all();
            $rolname = $input['rolename'];
            $input = $request->except(['rolename', '_token']);

            $validator = Validator::make($input, [
                'email' => 'required|email|unique:users,email,id,'
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The Email are exist'));
                return redirect()->back();
            }
            $temp_password = rand(200000, 999999);
            $input['password'] = Hash::make($temp_password);
            $user = User::create($input);
            $user->assignRole($rolname);
            $request->session()->flash('alert-success', __('User was successful added!') . ' Temporary Password is ' . $temp_password);
            return redirect()->back();
        } else {
            $departments = Department::all();
            $divisions = Division::all();
            $arr['departments'] = $departments;
            $roles = Role::where('guard_name','web')->get();
            $arr['roles'] = $roles;
            $arr['divisions'] = $divisions;
            return view('Crm.Employee.Add_view', $arr);
        }
    }

    public function index()
    {
        //$employee=User::all();
        $employee = User::withTrashed()->get();
        $role = Role::where('guard_name','web')->get();
        $arr['employees'] = $employee;
        $arr['roles'] = $role;
        return view('Crm.Employee.Index_view', $arr);
    }

    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Employee = User::find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Employee->delete();

        return redirect()->back();
        //   }
    }

    public function forcedelete(Request $request, $id)
    {
        //  $user=Auth::user();
        $Employee = User::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Employee->forceDelete();
        return redirect()->back();
        //   }

    }

    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Employee = User::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Employee->restore();

        return redirect()->back();
        //   }

    }

    public function update(Request $request, $id)
    {
        $Employee = User::find($id);

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
            $input = $request->all();
            $rolname = $input['rolename'];
            $input = $request->except(['rolename', '_token']);


            $validator = Validator::make($input, [
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($Employee->id),
                ],
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The Email are exist'));
                return redirect()->back();
            }


            $Employee->syncRoles([$rolname]);
            $Employee->update($input);
            $request->session()->flash('alert-success', __('User was successful Update!'));

            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);
            $departments = Department::all();

            $divisions = Division::all();
            $arr['departments'] = $departments;
            $role = Role::where('guard_name','web')->get();
            $arr['roles'] = $role;
            $arr['divisions'] = $divisions;
            $arr['employee'] = $Employee;
            return view('Crm.Employee.Update_view', $arr);
        }

    }
    public function updateprofile(Request $request, $id)
    {

        $Employee = User::find($id);
        if ($request->isMethod('post')) {
           // dd($request->all());
            $input = $request->all();


            if(!is_null($request->file('Signature')))
            {

            $Signaturename= $request->file('Signature')->getClientOriginalName();
            $Signature= $request->file('Signature');
            $Signaturename=rand(200000, 99999999).'.'.$Signature->getClientOriginalExtension();
            $Signature->move(public_path().'/Signature/',$Signaturename);
                $Employee->update([

                    'Signature'=>$Signaturename,
                ]);
            }
            if(!is_null($request->file('profile_pic'))) {
                $profile_picname = $request->file('profile_pic')->getClientOriginalName();
                $profile_pic = $request->file('profile_pic');
                $profile_picname =rand(200000, 999999999).'.'.$profile_pic->getClientOriginalExtension();
                $profile_pic->move(public_path() . '/Signature/', $profile_picname);
                $Employee->update([
                    'profile_pic'=>$profile_picname,

                ]);

            }

            $request->session()->flash('alert-success', __('User was successful Update!'));

            return redirect()->back();
        } else {
            //$users = User::select('id', 'name')->where('role', 'user')->get();
            //dd($users);
//dd($Employee);
            $arr['employee'] = $Employee;
            return view('Crm.Employee.Update_profile_view', $arr);
        }

    }

    public function reset(Request $request, $id)
    {
        $User = User::find($id);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('password and password confirmation not similer'));
                return redirect()->back();
            }
            $User->password = Hash::make($request->password);
            $User->save();
            $request->session()->flash('alert-success', __('User was successful Update password!'));
            return redirect()->back();
        } else {

            return view('Crm.Customer.Reset_view');
        }

    }

    public function view(Request $request, $id)
    {
        $User = User::find($id);
        $arr['employee'] = $User;
        return view('Crm.Employee.View_view', $arr);
    }

    public function viewcustomer($type, $id)
    {
        // $customer=Customer::all();
        if ($type == 'Del')
            $customer = Customer::onlyTrashed()->where('user_id', $id)->get();
        else
            $customer = Customer::where('user_id', $id)->get();
        $arr['customers'] = $customer;
        $arr['employeeId'] = $id;
        return view('Crm.Employee.Customer_view', $arr);
    }

    public static function permision($ob, $Type)
    {
        if (Auth::user()->hasAnyRole(['Admin'])){
            return true;
        }
        if ($ob->id !== 1) {
            $Departmentname = $ob->Division->Department->name;
            $Divisionname = $ob->Division->name;
            if (
                Auth::user()->hasAnyPermission([
                    'Department_' . $Departmentname . '_' . $Type,
                    'Department_' . $Departmentname . '_Division_' . $Divisionname .'_'.$Type,

                ])) {

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
}
