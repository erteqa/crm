<?php

namespace App\Http\Controllers\Customer;

use App\Model\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Ticket_cont extends Controller
{
    public function add(Request $request)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        if ($request->isMethod('post')) {
            $input=$request->only(['subject']);
            $input['customer_id']=$user->id;
            $input['department_id']=$user->Group->Division->Department->id;
            $input['status']='waiting';
            Ticket::create($input);
            $request->session()->flash('alert-success', __('User was successful added'));
            return redirect()->back();
        } else {

            return view('Customer.Ticket.Add_view');
        }
    }

    public function index()
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();

            $Tickets = Ticket::where('customer_id', $user->id)->get();
            $arr['Tickets'] = $Tickets;
            return view('Customer.Ticket.Index_view', $arr);


    }
    public function delete(Request $request, $id, $type)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
            $Ticket = Ticket::find($id);
        if($Ticket->customer_id==$user->id) {
            $Ticket->forceDelete();
            $request->session()->flash('alert-success', __('User was successful added'));
        } else
        {$request->session()->flash('alert-danger', __('cant'));}

        return redirect()->back();
    }
    public function forcedelete(Request $request, $id)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        $Ticket = Ticket::find($id);
        if($Ticket->customer_id==$user->id) {
            $Ticket->forceDelete();
            $request->session()->flash('alert-success', __('User was successful added'));
        } else
        {$request->session()->flash('alert-danger', __('cant'));}

        return redirect(route('Cu.Ticket.Index'));
    }
    public function restore(Request $request, $id)
    {
        //  $user=Auth::user();
        $Ticket = Ticket::onlyTrashed()->find($id);
        //if( $request->isMethod('post'))
//        $section=$post->Section;
//        if($user->can('control_post',$section))
//        {
        $Ticket->restore();

        return redirect()->back();
        //   }

    }

    public function view(Request $request, $id)
    {
       // dd($id);
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
            $Ticket = Ticket::find($id);
        $user=auth()->guard('customer')->user();
        if($Ticket->customer_id != $user->id) {
            $request->session()->flash('alert-danger', __('cant'));
            return redirect()->back();
        }
            if($Ticket->status != null) {
                $Ticket->status = 'read';
                $Ticket->update();
            }
            $arr['Ticket'] = $Ticket;
            return view('Customer.Ticket.View_view', $arr);
    }

    public static function getticket(){
     //dd('dwqdWDW');

//        if (!auth()->guard('customer')->user()){
//            return redirect(route('Customer.login'));
//        }

        $user = auth()->guard('customer')->user();
      //  echo ('<script>alert('.$user->id.')</script>');
        //dd('wefwfwef');
        $Ticket= Ticket::where('customer_id' ,$user->id)->where('reply','<>' ,null)->where('status','<>','read')->get();
        //$Ticket= Ticket::all();

        return $Ticket;
    }

}
