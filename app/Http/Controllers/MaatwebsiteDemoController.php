<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Group;
use App\Model\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;


class MaatwebsiteDemoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExport()
    {
      //  $dirs = File::directories(public_path().'Backup');
        $files = File::files('Backup');
        $groups=Group::all();
     //dd($files);
        $arr['files']=$files;
        $arr['groups']=$groups;
        return view('Backup.importExport',$arr);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel(Request $request)
    {

        $groupID=$request->input('group_id');
        $type=$request->input('type');
        //dd($request->all());
        if($groupID!=0)
            $gr=Group::find($groupID)->name;
        else
            $gr='AllCustomer';
        $date=date('Y-m-d');
        $filePath='Backup/'.$date.'_'.$gr.'.'.$type;
        //dd($filePath);

        if($groupID==0){
        Customer::all()->storeExcel(
        $filePath,
        $disk = 'public',
        $writerType = null,
        $headings = false

    );}else
        {
            Customer::where('group_id',$groupID)->get()->storeExcel(
                $filePath,
                $disk = 'public',
                $writerType = null,
                $headings = false
            );
        }
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::import($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }

            if(!empty($arr)){
                Item::insert($arr);
            }
        }

        return back()->with('success', 'Insert Record successfully.');
    }
}
