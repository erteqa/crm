<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Fileowner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Downloads_cont extends Controller
{
    public function download($file_name) {
       // dd($file_name);
        $file_path = public_path('Files/'.$file_name);
        return response()->download($file_path);

    }
    public function downloadBackup($file) {
        // dd($file_name);
        $file_path = public_path($file);
        return response()->download($file_path);

    }
    public function deletefileBackup($file) {
        // dd($file_name);

        unlink(public_path($file));

        return redirect()->back();

    }
    public function deletefile($id) {
        // dd($file_name);
        $file=Fileowner::find($id);
        unlink(public_path('/Files/'.$file->path));
        $file->delete();
        return redirect()->back();

    }
    public function uploadfile(Request $request,$id){
     //   dd($request->hasFile('files'));
        foreach ($request->file('files') as $file) {
            $name= $file->getClientOriginalName();
            //dd($file->getClientOriginalExtension());
            $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();

            // dd(public_path());
            $file->move(public_path().'/Files/',$rand);
            // $filename = $file->store('Files');
            Fileowner::create([
                'customer_id' => $id,
                'name' => $name,
                'path' =>$rand,
            ]);
        }
       // $request->session()->flash('alert-success', __('User was successful added!').' Temporary Password is ' . $temp_password  );
        return redirect()->back();
    }
    public function complogoupload(Request $request,$id){
       // dd('gggg');
        $file=Company::find($id);
        if(!is_null($file->logo))
       // unlink(public_path('/Images/'.$file->logo));

        foreach ($request->file('files') as $file) {
            $name= $file->getClientOriginalName();
            $rand= rand(200000, 999999999).'.'.$file->getClientOriginalExtension();
            $name=$rand;
            $file->move(public_path().'/Images/',$name);

            Company::find($id)->update([
                'logo' => $name,
            ]);
        }
        // $request->session()->flash('alert-success', __('User was successful added!').' Temporary Password is ' . $temp_password  );
        return redirect()->back();
    }

}
