<?php

namespace App\Http\Controllers\Customer;

use App\Model\Fileowner;
use App\Model\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer_cont extends Controller
{
    public function view(Request $request)
    {
        $Customer = auth()->guard('customer')->user();
        $id=$Customer->id;
        // $input=$request->all();
        if ($request->isMethod('post')) {

            return redirect()->back();
        } else {
            $groups=Group::all();
            $files=Fileowner::where('customer_id',$id)->get();
            $arr['files']=$files;

            $arr['groups']=$groups;
            $arr['customer']=$Customer;
            return view('Customer.Customer.View_view', $arr);
        }

    }
}
