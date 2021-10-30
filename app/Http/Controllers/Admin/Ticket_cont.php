<?php

namespace App\Http\Controllers\Admin;

use App\Model\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Ticket_cont extends Controller
{

    public function index()
    {
        if (!Auth::user()){
            return redirect(route('login'));
        }
        $user=Auth::user();
        if($user->hasAnyRole(['Admin'])) {
            $Tickets = Ticket::all();
        }else {
            $Tickets = Ticket::where('department_id', $user->Department->id)->get();
        }
        $arr['Tickets'] = $Tickets;
        return view('Crm.Ticket.Index_view', $arr);


    }
    public function view(Request $request, $id)
    {
        $Ticket = Ticket::find($id);
        $user=Auth::user();
        if ($request->isMethod('post')) {


            if ($request->input('reply') != null) {
                $Ticket->reply = $request->input('reply');
                $Ticket->user_id=$user->id;
                $Ticket->status='reply';
                $Ticket->update();
            }
            return redirect()->back();
        }
        else {
            $arr['Ticket'] = $Ticket;
            return view('Crm.Ticket.View_view', $arr);
        }

    }

    public static function getuserticket(){
        $user=Auth::user();
        if($user->hasAnyRole(['Admin'])){
            $Ticket= Ticket::where('status','waiting')->get();
        }else
        {$Ticket= Ticket::where('department_id',$user->Department->id)->where('status','waiting')->get();}
        return $Ticket;
    }
}
