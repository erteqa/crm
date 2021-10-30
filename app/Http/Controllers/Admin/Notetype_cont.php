<?php

namespace App\Http\Controllers\Admin;

use App\Model\Notetype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Notetype_cont extends Controller
{
    public function add(Request $request){

        if ($request->isMethod('post')) {
            $input=$request->all();

            Notetype::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        }
    }
}
