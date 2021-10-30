<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerLoginController extends Controller
{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    protected $guard = 'customer';



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.customerLogin');
    }
    public function login(Request $request)

    {
        if (auth()->guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $userStatus = auth()->guard('customer')->user()->isactive;
           // dd($userStatus);
            if($userStatus==1) {
                return redirect(route('Cu.Dashboard.Index'));
            }else{
                Auth::logout();
                Session::flush();
                $request->session()->flash('alert-danger', __('You not Active'));
                return redirect()->back();
                //return redirect(url('login'))->withInput()->with('errorMsg','You are temporary blocked. please contact to admin');
            }

        }
        $request->session()->flash('alert-danger', __('Email or password are wrong'));
        return redirect()->back();
       // return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
