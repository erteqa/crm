<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\Expense;
use App\Model\Invoice;
use App\Model\Msgafter;
use App\Model\Msgbefore;
use App\Model\Task;
use App\Model\Transaction;
use App\User;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts;
use Illuminate\Support\Facades\DB;

class Dashboard_cont extends Controller
{
    public function __construct()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
    }

    public function index()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $user = Auth::user();
        if ($user->hasAnyPermission(['Only_My_Customers'])) {
            $Invoices=array();
        } else {
            $Invoices = Invoice::all()->sortByDesc('created_at');
        }
        if ($user->hasAnyPermission(['Only_My_Customers'])) {
            $customers = Customer::where('user_id', $user->id)->get();
        } else
            $customers = Customer::where('created_at', '>=', date(\Carbon\Carbon::today()->subDays(15)))->get();
        if (Auth::user()->hasAnyRole(['Admin'])) {
            $countTasks = Task::all()->count();
            $dataWithAllTasks = Task::all()->sortByDesc('created_at')->where('state_id', '<>', 5)->take(9);
            $completedTasks = Task::where('state_id', 5)->get()->count();
        } else {

            $countTasks = Task::where('Department_id', Auth::user()->Department->id)->count();
            //dd(Auth::user()->Department->id);
            $dataWithAllTasks = Task::where('Department_id', Auth::user()->Department->id)->where('state_id', '<>', 5)->get()->take(7);
            // dd($dataWithAllTasks);
            $completedTasks = Task::where('state_id', 5)->where('Department_id', Auth::user()->Department->id)->get()->count();

        }
        if ($countTasks == 0) {
            $percentage = 0;
            $uncompletedTasks = 0;
            $percentageun = 0;
        } else {
            $percentage = round(($completedTasks / $countTasks) * 100);
            $uncompletedTasks = $countTasks - $completedTasks;
            $percentageun = round(($uncompletedTasks / $countTasks) * 100);
        }
        $arr['countTasks'] = $countTasks;
        $arr['completedTasks'] = $completedTasks . ' (' . $percentage . '%)';
        $arr['uncompletedTasks'] = $uncompletedTasks . ' (' . $percentageun . '%)';
        $arr['dataWithAllTasks'] = $dataWithAllTasks;
        $arr['Invoices'] = $Invoices;
        $arr['customers'] = $customers;
        $Income = Transaction::where('type', 'Income')->sum('amount');
        $Payment = Transaction::where('type', 'Expense')->sum('amount');
        $Expense = Expense::all()->sum('amount');
//Carbon::now()->startOfMonth()->toDateString();
//dd(Carbon::now()->subDays(30)->toDateString());
        $arr['Income'] = $Income;
        $arr['Expenses'] = $Expense;
        $arr['Payment'] = $Payment;

        $arr['D_Expenses'] = Expense::where('date', '>=', \Carbon\Carbon::today()->toDateString())->sum('amount');
        $arr['M_Expenses'] = Expense::where('date', '>=', Carbon::now()->subDays(30)->toDateString())->sum('amount');

        $arr['D_Payment'] = Transaction::where(
            function ($query) {
                $query->where('type', 'Expense');
            })->where('date', '>=', \Carbon\Carbon::today()->toDateString())->sum('amount');
        $arr['M_Payment'] = Transaction::where(
            function ($query) {
                $query->where('type', 'Expense');
            })->where('date', '>=', Carbon::now()->subDays(30)->toDateString())->sum('amount');;

        $arr['D_Income'] = Transaction::where(
            function ($query) {
                $query->where('type', 'Income');
            })->where('date', '>=', \Carbon\Carbon::today()->toDateString())->sum('amount');
        $arr['M_Income'] = Transaction::where(
            function ($query) {
                $query->where('type', 'Income');
            })->where('date', '>=', Carbon::now()->subDays(30)->toDateString())->sum('amount');

//dd($Invoices);

        return view('dashboard_view', $arr);
    }

    public static function getalert()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $user = Auth::user();
        $alerts = Msgafter::where('user_id', $user->id)->take(3)->get();
        // dd($alerts);
        return $alerts;
    }

    public static function refersh()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $msgbefor = Msgbefore::all();
        $datenow = date("Y-m-d H:i:s");
        // $long = strtotime($datenow);

        //  dd( $long);
        foreach ($msgbefor as $msg) {
            if ($datenow > $msg->timebefore) {

                Msgafter::create([
                    'name' => $msg->name,
                    'description' => $msg->description,
                    'user_id' => $msg->user_id,
                    'isread' => 0,
                ]);
                $msg->delete();
            }

        }
    }

    public static function gettask()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $user = Auth::user();
        $Tasks = Task::where('user_id', $user->id)->where('state_id', '<>', 5)->take(9)->get();

        return $Tasks;
    }

    public function login()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        return redirect(route('Dashboard'));
    }


}

