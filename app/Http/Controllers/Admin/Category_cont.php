<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Category_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            // dd($input);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:categories|max:255',
            ]);
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('The field exists'));
                return redirect()->back();
            }
            Category::create($input);

            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        }
    }

    public function index()
    {
        //$Categorys=Category::all();
        $Categorys = Category::all();
        $arr['Cats'] = $Categorys;
        return view('Crm.Category.Index_view', $arr);
    }

    public function delete(Request $request, $id)
    {
        //  $user=Auth::user();'%' . Input::get('name') . '%'
        $department = Category::find($id);

        $department->delete();
        return redirect()->back();
        //   }

    }
}
