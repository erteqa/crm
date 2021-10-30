<?php

namespace App\Http\Controllers\Customer;

use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard_cont extends Controller
{

    public function index(){
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        return view('Customer.dashboard_view');
    }
    public function logout(Request $request){
        auth()->guard('customer')->logout();
        $request->session()->invalidate();
        return redirect(route('Customer.login'));
    }
    public static function gettask()
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        $Tasks = Task::where('customer_id', $user->id)->take(9)->get();

        return $Tasks;
    }
}
