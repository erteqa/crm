<?php

namespace App\Http\Controllers\Admin;

use App\Model\Not;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Note_cont extends Controller
{
   public function add(Request $request){
       if ($request->isMethod('post')) {
           $input=$request->all();
           $input['user_id']=Auth::user()->id;
           Not::create($input);
           $request->session()->flash('alert-success', __('User was successful added!'));
           return redirect()->back();
       }
   }

   public function index(Request $request){
       if(Auth::user()->hasAnyRole(['Admin']) ){
           $Note=Not::all();
       }else{
           $Note=Not::where('user_id','<>',1)->get();
       }


       $arr['Notes']=$Note;
       //dd($Note);
       return view('Crm.Notes.Index_view',$arr);
   }

    public function delete(Request $request, $id)
    {

        $Note = Not::find($id);
        if(Auth::user()->id==$Note->user_id)
        {$Note->delete();
            $request->session()->flash('alert-success', __('User was successful Deleted!'));
        }else{
            $request->session()->flash('alert-danger', __('لا تملك صلاحية حذف هذه الملاحظة'));
        }
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $input=$request->all();
        $Note =Not::find($input['id']);

        if ($request->isMethod('post')) {
            if(Auth::user()->id==$Note->user_id)
            {
                $Note->update($request->all());
                $request->session()->flash('alert-success', __('User was successful Deleted!'));
            }else{
                $request->session()->flash('alert-danger', __('لا تملك صلاحية حذف هذه الملاحظة'));
            }

            $request->session()->flash('alert-success', __('User was successful Update!') );
            return redirect()->back();
        }

    }

}
