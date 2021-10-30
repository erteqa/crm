<?php

namespace App\Http\Controllers\Accounting;

use App\Model\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Expense_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            if(self::permision('Add')) {
                $request->session()->flash('alert-success', __('Done'));
            }
            else {
                $request->session()->flash('alert-danger', __('You dont have permasion'));
                return redirect()->back();
            }
            $pay=Expense::create([
                'amount'=>$request->input('amount'),
                'user_id'=>Auth::user()->id,
                'note'=>$request->input('note'),
                'date'=>$request->input('date'),
            ]);
            $request->session()->flash('alert-success', __('Done'));
            return redirect()->back();
        }else{
            return view('Acounting.Expense.Add_view');
        }
    }
    public function index($type)
    {
        // $customer=Customer::all();
        if($type=='Del')
            $expense=Expense::onlyTrashed()->get();
        else
            $expense=Expense::all();
        $arr['Expenses']=$expense;
        return view('Acounting.Expense.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        $customer=Expense::find($id);
        if(self::permision('Delete')) {
            $customer->delete();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();
    }
    public function forcedelete(Request $request, $id)
    {
        $Expense=Expense::onlyTrashed()->find($id);
        if(self::permision('ForceDelete')) {
            $Expense->forceDelete();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();
    }
    public function restore(Request $request, $id)
    {
        $Expense=Expense::onlyTrashed()->find($id);
        if(self::permision('ForceDelete')) {
            $Expense->restore();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();


    }
    public function update(Request $request, $id)
    {
        $Expense = Expense::find($id);
        if ($request->isMethod('post')) {
            if(self::permision('Update')) {
                $Expense->update($request->all());
                $request->session()->flash('alert-success', __('Done'));
            }
            else {
                $request->session()->flash('alert-danger', __('You dont have permasion'));
            }
            return redirect()->back();
        } else {
            $customers=Customer::all();
            $arr['customers']=$customers;
            $arr['payment']=$Expense;
            return view('Acounting.Expense.Update_view', $arr);
        }

    }
    public function view(Request $request, $id)
    {
        $Expense = Expense::find($id);

        $arr['Expense'] = $Expense;
        return view('Acounting.Expense.View_view', $arr);
    }
    public static function permision($Type)
    {


        if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission([
                'Expense_'.$Type,

            ]) )   {
            return true;
        }else{
            return false;
        }
    }
}
