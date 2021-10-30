<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Customer;
use App\Model\Transaction;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class Summary_cont extends Controller
{
    protected $pdf;

    public function __construct()
    {
        $this->pdf = new Dompdf();
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $customer = Customer::find($request->input('customer_id'));
            $from = $request->input('sdate');
            $to = $request->input('edate');
            if ($request->input('trans_type') == 'All') {
                $transaction = Transaction::where(
                    function ($query) {
                        $query->where('type', 'Income')->orWhere('type', 'Deposit');
                    })->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            } elseif ($request->input('trans_type') == 'Income') {
                $transaction = Transaction::where('type', 'Income')->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            } else {
                $transaction = Transaction::where('type', 'Deposit')->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            }
            $comp = Company::find(1);
            $trans_type = $request->input('trans_type');

            $arr['company'] = $comp;
            $arr['trans_type'] = $trans_type;
            $arr['sdate'] = $from;
            $arr['edate'] = $to;
            $arr['customer'] = $customer;
            $arr['Transactions'] = $transaction;
          //  dd($transaction);
            $arr['invoices'] = $customer->Invoice;
           // dd($customer->Invoice);
            return view('Acounting.Account_statement.Account_statement', $arr);
        } else {
            $customer = Customer::all();
            $arr['customers'] = $customer;


            return view('Acounting.Account_statement.create', $arr);
        }
    }

    function load($param = NULL)
    {
        require_once base_path() . '/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 40, 'margin_bottom' => 12]);
        //$mpdf->SetDirectionality('RTL');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        return $mpdf;
    }

    public function download(Request $request)
    {
        if ($request->isMethod('post')) {
            //    dd($request->all());
            $customer = Customer::find($request->input('customer_id'));
            $from = $request->input('sdate');
            $to = $request->input('edate');
            if ($request->input('trans_type') == 'All') {
                $transaction = Transaction::where(
                    function ($query) {
                        $query->where('type', 'Income')->orWhere('type', 'Deposit');
                    })->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            } elseif ($request->input('trans_type') == 'Income') {
                $transaction = Transaction::where('type', 'Income')->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            } else {
                $transaction = Transaction::where('type', 'Deposit')->whereBetween('date', [$from, $to])->where('customer_id', $customer->id)->get();
            }
            $comp = Company::find(1);
            $trans_type = $request->input('trans_type');

            $arr['company'] = $comp;
            $arr['trans_type'] = $trans_type;
            $arr['sdate'] = $from;
            $arr['edate'] = $to;
            $arr['customer'] = $customer;
            $arr['Transactions'] = $transaction;
            $arr['invoices'] = $customer->Invoice;
            ini_set('memory_limit', '64M');

            $html = view('Acounting.Account_statement.download', $arr)->render();
            $pdf = $this->load();


            $pdf->SetHTMLHeader('<br>');
            $pdf->SetHTMLFooter('<div style="text-align: right;font-family: serif; font-size: 8pt; color: #5C5C5C; font-style: italic;margin-top:0pt;">{PAGENO}/{nbpg} #</div>');

            $pdf->WriteHTML($html);

//           if ($type == 'd') {
            ob_clean();
            $pdf->Output('Invoice_.pdf', 'D');
//           } else {
//               ob_clean();
//               $pdf->Output('Invoice_#' . $tid . '.pdf', 'I');
//           }

        }
    }
}


