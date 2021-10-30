<?php

namespace App\Http\Controllers;

use App\Notifications\Addcunot;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class Notification_cont extends Controller
{
  public function delete(Request $request){

      $id = $request->input('source');

      $user=Auth::user();
      $not=$user->Notifications()->find($id);
      $not->delete();

      return 'sucsess';
  }
  public function deleteall(Request $request){
      $user=Auth::user();
      $user->notifications()->delete();

  }

    public function makeread(Request $request){
     // return 'fferfq';
        $id = $request->input('source');
        $user=Auth::user();
       // return 'fferfq';
        $not=$user->Notifications()->find($id);
     //   return 'fferfq';
        $not->MarkAsRead();
        return 'sucsess';
    }

    public function Index(Request $request,$id){

        $user=Auth::user();
        $not=$user->Notifications()->find($id);

        switch ($not->data['type'])
        {
            case 'Customer':$not->MarkAsRead();return redirect(route('Customer.View',[ 'id' =>$not->data['customer_id']]));
                break;
            case 'Invoice':$not->MarkAsRead();return redirect(route('Invoice.View',[ 'id' =>$not->data['Invoice_id']]));
                break;
            case 'unread':$msgs=$user->unreadNotifications;
                break;
            default:return redirect()->back();
        }
    }
}
