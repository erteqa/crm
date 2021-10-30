<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Style_cont extends Controller
{
    public static function progress($count)
    {
        switch (true) {
            case $count <= 20:
                $color = 'progress-bar-danger';
                break;

            case $count <= 40:
                $color = 'progress-bar-warning';
                break;

            case $count <= 60:
                $color = 'progress-bar-info';
                break;
            case $count <= 80:
                $color = 'progress-bar-success';
                break;
            default:
                $color = 'progress-bar-success';
                break;
        }
        return $color;
    }

    public function lang($lang)
    {
        $user = Auth::user();
if($user){
        $user->lang = $lang;
        $user->update();}

        Session::put('locale', $lang);

        return redirect()->back();
    }

    public function cu_lang($lang)
    {
        $user = auth()->guard('customer')->user();
//dd($user->name);
        $user->lang = $lang;
        $user->update();

        Session::put('locale', $lang);

        return redirect()->back();
    }
    public function pattern(Request $request,$pattern){
        $user = Auth::user();
        if($user){
            $user->pattern = $pattern;
            $user->update();}
        return redirect()->back();
    }
    public function getnotification(Request $request){

        $notification = $request->input('notification');
     //return $notification["data"]["icon"];
        $arr['not']=$notification;
        return view('info.notification',$arr);
    }
}
