<?php

namespace App\Http\Controllers\Customer;

use App\Model\Company;
use App\Model\Customer;
use App\Model\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Invoice_cont extends Controller
{
    public function index(){
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        $invoice = Invoice::where('customer_id', $user->id)->get();
        //dd($invoice);
        $arr['invoices'] = $invoice;
        return view('Customer.Invoice.index_view', $arr);
    }
    public function view(Request $request, $id)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        $Invoice = Invoice::find($id);
        if($user->id != $Invoice->customer_id){
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
        $tid = Invoice::find($id)->tid;
        $data['id'] = $tid;
        $data['title'] = "Invoice $tid";
        $data['invoice'] = $Invoice;
        if ($data['invoice']) $data['products'] = $Invoice->Invoice_Item;
        if ($data['invoice']) $data['employee'] = $Invoice->User;
        $Company = Company::find(1);
        $customer = Customer::find($Invoice->customer_id);
        $data['company'] = $Company;
        $data['customer'] = $customer;
        return view('Customer.Invoice.View_invoice', $data);
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
    public function printinvoice(Request $request,$id, $type)
    {
        if (!auth()->guard('customer')->user()){
            return redirect(route('Customer.login'));
        }
        $user = auth()->guard('customer')->user();
        $Invoice = Invoice::find($id);
        if($user->id != $Invoice->customer_id){
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }
        $tid = Invoice::find($id)->tid;
        $data['id'] = $tid;
        $data['title'] = "Invoice $tid";
        $data['invoice'] = $Invoice;
        if ($data['invoice']) $data['products'] = $Invoice->Invoice_Item;
        if ($data['invoice']) $data['employee'] = $Invoice->User;
        $Company = Company::find(1);
        $customer = Customer::find($Invoice->customer_id);
        $data['company'] = $Company;
        $data['customer'] = $customer;


        ini_set('memory_limit', '64M');
        $footer = '<div style="text-align: right;font-family: serif; font-size: 8pt; color: #5C5C5C; font-style: italic;margin-top:0pt;">{PAGENO}/{nbpg} #' . $tid . '</div>';
        // $html = $this->load->view('invoices/view-print-'.L, $data, true);
        $html = view('Acounting.Invoice.view_print_rlt', $data)->render();
        $html2 = view('Acounting.Invoice.header-print', $data)->render();

        // $html2='';
        //$html="dddddddddddddddd";
//dd($html2);

        $pdf = $this->load();

        $pdf->SetHTMLHeader($html2);

        $pdf->SetHTMLFooter('<div style="text-align: right;font-family: serif; font-size: 8pt; color: #5C5C5C; font-style: italic;margin-top:0pt;">{PAGENO}/{nbpg} #' . $tid . '</div>');

        $pdf->WriteHTML($html);

        if ($type == 'd') {
            ob_clean();
            $pdf->Output('Invoice_#' . $tid . '.pdf', 'D');
        } else {
            ob_clean();
            $pdf->Output('Invoice_#' . $tid . '.pdf', 'I');
        }


    }

}
