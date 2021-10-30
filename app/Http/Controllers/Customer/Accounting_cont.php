<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Accounting_cont extends Controller
{
  public function Make(Request $request){
      if (!auth()->guard('customer')->user()){
          return redirect(route('Customer.login'));
      }

      if ($request->isMethod('post')) {

          $request->session()->flash('alert-success', __('lang.message_has_send'));
          return redirect()->back();
      }else{

          return view('Customer.Acounting.make_account_view');
      }

  }
}
