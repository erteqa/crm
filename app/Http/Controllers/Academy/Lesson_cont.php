<?php

namespace App\Http\Controllers\Academy;

use App\Model\Course;
use App\Model\Lesson;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Lesson_cont extends Controller
{
    public function add(Request $request,$id)
    {
        if ($request->isMethod('post')) {
            $input=$request->all();
            $input['addby']=Auth::user()->id;
            $input['course_id']=$id;
            Lesson::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            $arr['Coursid']=$id;
            return view('Academy.Lesson.Add_view',$arr);
        }
    }
    public function index($id)
    {
       // $user=Auth::user();
        $Course = Course::find($id);
        //$addby=User::find($user->id);
        if (!is_null($Course->Lesson))
        $arr['Lessons']=$Course->Lesson;
        else
         $arr['Lessons']=array();
        $arr['Coursid']=$id;

        return view('Academy.Lesson.Index_view', $arr);
    }
    public function delete(Request $request, $id)
    {

            $Lesson = Lesson::find($id);

            $Lesson->delete();
            $request->session()->flash('alert-success', __('User was successful added!'));


        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $Lesson = Lesson::find($id);

        if ($request->isMethod('post')) {

            $Lesson->update($request->all());
            $request->session()->flash('alert-success', __('User was successful update'));
            return redirect()->back();
        } else {
            $arr['Lesson'] = $Lesson;

            return view('Academy.Lesson.Update_view', $arr);
        }

    }
    public function view(Request $request, $id, $type)
    {

        $Lesson = Lesson::find($id);

        $arr['Lesson'] = $Lesson;
        return view('Academy.Lesson.View_view', $arr);

    }
}
