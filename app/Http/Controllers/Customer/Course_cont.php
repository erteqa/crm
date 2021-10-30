<?php

namespace App\Http\Controllers\Customer;

use App\Model\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class Course_cont extends Controller
{
    /**
     * Course_cont constructor.
     */
    public function __construct(){

        if (!auth()->guard('customer')->user())
        {
           // dd('ssdf');
             Redirect()->route ("Customer.login");
           //return redirect(route('Customer.login'));
        }
           // Redirect::to(route('Customer.login'))->send();
    }

    public function index()
    {
        if (!auth()->guard('customer')->user())
        {
            // dd('ssdf');Redirect()->route ("Customer.login");
            return redirect(route('Customer.login'));
        }
        $user=auth()->guard('customer')->user();
        $Course = Course::all();
        $Courses=array();
        $Other=array();
        foreach ($Course as $co){
            if($user->hasAnyPermission([$co->title]))
                array_push($Courses,$co);
            else
                array_push($Other,$co);
        }
        $arr['Courses']=$Courses;
        $arr['Other']=$Other;
//dd($Other);
        return view('Customer.Course.Index_view', $arr);
    }
}
