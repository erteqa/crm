<?php

namespace App\Http\Controllers\Accounting;

use App\Model\Customer;
use App\Model\Payment;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Payment_cont extends Controller
{
    public function getcusinfo(Request $request)
    {
        //dd('deferf');
        $Customer = Customer::find($request->input('id'));
        $html ='<select class="js-example-basic-single form-control" id="tid" name="invoice_id" required>';
        $Invoices=$Customer->Invoice;
       // dd($tids);
       foreach ($Invoices as $Invoice){
           $html.=' <option value="'.$Invoice->id.'">'.$Invoice->tid.'</option>';
       }
       $html.='</select>';
        return $html;
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $pay=Payment::create([
                'amount'=>$request->input('amount'),
                'invoice_id'=>$request->input('invoice_id'),
                'user_id'=>Auth::user()->id,
                'customer_id'=>$request->input('customer_id'),
                'note'=>$request->input('note'),
                'date'=>$request->input('date'),
            ]);

            Transaction::create(
                [
                    'customer_id' =>$request->input('customer_id'),
                    'date' => $request->input('date'),
                    'invoice_id' => $request->input('invoice_id'),
                    'type'=>'Expense',
                    'payment_id'=>$pay->id,
                    'user_id' => Auth::user()->id,
                    'amount' => $request->input('amount'),
                    'note' => $request->input('shortnote'),
                ]
            );
            $request->session()->flash('alert-success', __('Done'));
            return redirect()->back();
        }else{
            $customers=Customer::all();
            $arr['customers']=$customers;
            return view('Acounting.Payment.Add_view',$arr);
        }

    }


    public function index($type)
    {
        // $customer=Customer::all();
        if($type=='Del')
            $payment=Payment::onlyTrashed()->get();
        else
            $payment=Payment::all();
       // dd($payment);
        $arr['payments']=$payment;
        return view('Acounting.Payment.Index_view',$arr);
    }
    public function delete(Request $request, $id)
    {
        $customer=Payment::find($id);
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

        $Payment=Payment::onlyTrashed()->find($id);
        if(self::permision('ForceDelete')) {
            $Payment->forceDelete();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();


    }
    public function restore(Request $request, $id)
    {
        $Payment=Payment::onlyTrashed()->find($id);
        if(self::permision('ForceDelete')) {
            $Payment->restore();
            $request->session()->flash('alert-success', __('Done'));
        }
        else {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
        }
        return redirect()->back();


    }
    public function update(Request $request, $id)
    {
        $Payment = Payment::find($id);
        if ($request->isMethod('post')) {
            if(self::permision('Update')) {
                $Payment->update($request->all());
                $request->session()->flash('alert-success', __('Done'));
            }
            else {
                $request->session()->flash('alert-danger', __('You dont have permasion'));
            }
            return redirect()->back();
        } else {
            $customers=Customer::all();
            $arr['customers']=$customers;
            $arr['payment']=$Payment;
            return view('Acounting.Payment.Update_view', $arr);
        }

    }
    public function view(Request $request, $id)
    {
        $Payment = Payment::find($id);

        $arr['payment'] = $Payment;
        return view('Acounting.Payment.View_view', $arr);
    }

    public static function permision($Type)
    {


        if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission([
               'Payment_'.$Type,

            ]) )   {
            return true;
        }else{
            return false;
        }
    }
}
