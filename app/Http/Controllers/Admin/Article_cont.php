<?php

namespace App\Http\Controllers\Admin;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Article_cont extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $input['user_id']= Auth::user()->id;
           // dd($input);
            Article::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
$cat=Category::all();
$arr['Cats']=$cat;
            return view('Crm.Article.Add_view',$arr);
        }
    }

    public function index($type)
    {

        $user = Auth::user();
        if (!$user){
            return redirect(route('login'));
        }
        $Articls=array();

        if ($type == 'Del'){
            $Articl =Article::onlyTrashed()->orderBy('created_at','desc')->get();
            if(!Auth::user()->hasAnyRole(['Admin'])){
                foreach ($Articl as $art){

                    if($art->status == 'all' ){
                        array_push($Articls,$art);
                    }elseif($art->status == 'Deprtment_me' and (Department_cont::permision($art->User->Department,'View') or $user->department_id==$art->User->Department->id))
                    {array_push($Articls,$art);}
                    elseif($art->status == 'none' and $user->id == $art->user_id){
                        array_push($Articls,$art);
                    }
                }}else{
                $Articls=$Articl;
            }
        }else{
            $Articl =Article::all()->sortByDesc('created_at');
            if(!Auth::user()->hasAnyRole(['Admin'])){
                foreach ($Articl as $art){
               //  dd('ddd='.$art->User->Department->name);
                    if($art->status == 'all' ){
                        array_push($Articls,$art);
                    }elseif($art->status == 'Deprtment_me' and
//dd('Department_' . $art->User->Department->name  . '_'.'View')
                        (Department_cont::permision($art->User->Department,'View')
                            or $user->department_id==$art->User->Department->id))
                    {array_push($Articls,$art);}
                    elseif($art->status == 'none' and $user->id == $art->user_id){
                        array_push($Articls,$art);
                    }
                }}else{
                $Articls=$Articl;
            }
        }


        $arr['Articles']=$Articls;
        $Articls[0]->Category;
       // dd( $Articls[0]->Category->name);
        return view('Crm.Article.Index_view', $arr);
    }

    public function delete(Request $request, $id)
    {
        $Article = Article::find($id);
        $Article->delete();
        return redirect()->back();
    }

    public function forcedelete(Request $request, $id)
    {

        $Article = Article::onlyTrashed()->find($id);
        $Article->forceDelete();
        return redirect()->back();


    }

    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Article = Article::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Article->restore();

        return redirect()->back();
        //   }

    }

    public function update(Request $request, $id)
    {
        $Article = Article::find($id);
        if ($request->isMethod('post')) {
            $Article->update($request->all());
            return redirect()->back();
        } else {

            $arr['Article'] = $Article;
            $arr['Cats']=Category::all();
          //  dd($Article);
            return view('Crm.Article.Update_view', $arr);
        }

    }

    public function view(Request $request, $id)
    {
        $Article = Article::find($id);


            $arr['Article'] = $Article;

            return view('Crm.Article.View_view', $arr);

    }
    public function exview(Request $request, $id)
    {
        $Article = Article::find($id);


            $arr['Article'] = $Article;

            return view('Crm.Article.Ex_View_view', $arr);

    }
}
