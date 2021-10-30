<?php

namespace App\Http\Controllers\Academy;

use App\Model\Course;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mpdf\Tag\U;
use Spatie\Permission\Models\Permission;

class Course_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input=$request->all();
            $input['addby']=Auth::user()->id;
           // dd($input);
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:courses,title,NULL,id'.$input['title']
            ]);

            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The title exists'));
                return redirect()->back();
            }
            Course::create($input);

            Permission::create(['name' => $input['title'],'guard_name'=>'customer']);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            return view('Academy.Course.Add_view');
        }
    }
    public function index()
    {
        $user=Auth::user();
            $Course = Course::all();
          //  $addby=User::find($user->id);
            $arr['Courses']=$Course;
           // dd($Course);

            return view('Academy.Course.Index_view', $arr);
    }
    public function delete(Request $request, $id)
    {

            $Course = Course::find($id);

      //  $permissions = Permission::where('name', 'like', $Course->title)->get();

        $permissions = Permission::where('name', 'like',$Course->title)->get();
        foreach ($permissions as $permission) {
            $permission->delete();
        }
            $Course->delete();
            $request->session()->flash('alert-success', __('User was successful delete'));
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $Course = Course::find($id);

        if ($request->isMethod('post')) {

            $Course->update($request->all());
            $request->session()->flash('alert-success', __('User was successful update'));
            return redirect()->back();
        } else {
            $arr['Course'] = $Course;
            return view('Academy.Course.Update_view', $arr);
        }

    }
    public function view(Request $request, $id, $type)
    {

            $Course = Course::find($id);

            $arr['Course'] = $Course;
            return view('Academy.Course.View_view', $arr);

    }

}
