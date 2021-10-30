<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class Permissions_cont extends Controller
{
    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $input=$request->all();
            //dd($input);

            $array= array();

            foreach ($input['name'] as $name)
            {
                $M=$name.' '.$input['type'];
              //  dd( $M);
                Permission::create(['name'=>$M]);

            }
            //dd($array);

            $request->session()->flash('alert-success', __('User was successful added!') );
            return redirect()->back();
        }else{
            return view('Crm.Permissions.Add_view');
        }
    }
}
