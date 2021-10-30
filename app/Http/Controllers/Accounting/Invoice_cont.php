<?php

namespace App\Http\Controllers\Accounting;



use App\Model\Balance;
use App\Model\Company;
use App\Model\Customer;
use App\Model\Invoice;
use App\Model\Invoice_Item;
use App\Model\Transaction;

use App\Notifications\Addcunot;
use App\Notifications\Addinvoicenot;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;



class Invoice_cont extends Controller
{
    protected $pdf;

    public function __construct()
    {
        $this->pdf = new Dompdf;
    }

    public function index($type ,Request $request)
    {
        if (!self::permision('Invoice_View')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        if ($type == 'Del')
            $invoice = Invoice::onlyTrashed()->get();
        else
            $invoice = Invoice::all()->sortByDesc('created_at');
        $arr['invoices'] = $invoice;
        return view('Acounting.Invoice.Index_view', $arr);
    }

    public function update(Request $request, $id)
    {
        if (!self::permision('Invoice_Update')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        $invoice = Invoice::find($id);
        if ($invoice->status != 'due' and $invoice->status != 'partial') {
            $request->session()->flash('alert-danger', __('lang.You_cant_update_invoice'));
            return redirect()->back();
        }
        $products = $invoice->Invoice_Item;
//        dd($products);
        if ($request->isMethod('post')) {
            $input = $request->all();
            $tid = $request->input('invocieno');//tid1
            $customer_id = $request->input('customer_id');//customer_id2
            $user_id = Auth::user()->id;//3
            $invoicedate = $request->input('invoicedate');//4
            $invocieduedate = $request->input('invocieduedate');//5
            $subtotal = $request->input('subtotal');//6
            $discount = $request->input('Totldiscount');
            $tax = $request->input('Totltax');
            $format_discount = $request->input('discountFormat');//7
            if ($format_discount == '0') {
                $discstatus = 0;//8
            } else {
                $discstatus = 1;
            }
            $taxstatus = $request->input('tax_handle');//10
            $total = $request->input('total');//11
            $notes = $request->input('notes');//12
            $data = [
                'tid' => intval($tid),
                'customer_id' => intval($customer_id),
                'user_id' => intval($user_id),
                'invoicedate' => $invoicedate,
                'invoiceduedate' => $invocieduedate,
                'subtotal' => floatval($subtotal),
                'discount' => floatval($discount),
                'discstatus' => floatval($discstatus),
                'format_discount' => $format_discount,
                'tax' => floatval($tax),
                'taxstatus' => $taxstatus,
                'total' => floatval($total),
                'notes' => $notes,
            ];
            // dd($request->all());
            $validator = Validator::make($request->all(), [
//                    'invocieno' => 'required'|
//                      Rule::unique('invoices')->ignore($invoice->id),
            ]);
            if ($customer_id == 0) {
                $request->session()->flash('alert-danger', __('Please add a new client'));
                return redirect()->back();
            }
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('invoices Number existed'));
                return redirect()->back();
            }
            //  dd($data);
            $invoice->update($data);
            $items = $invoice->Invoice_Item;
            foreach ($items as $item) {
                $item->delete();
            }
            $product_name1 = $request->input('product_name');
            $product_qty = $request->input('product_qty');
            $product_price = $request->input('product_price');
            $product_tax = $request->input('product_tax');
            $product_discount = $request->input('product_discount');
            $product_subtotal = $request->input('product_subtotal');
            $ptotal_tax = $request->input('taxa');
            $ptotal_disc = $request->input('disca');
            $product_des = $request->input('product_description');

            $pid = $request->input('pid');
            //dd($pid);
            foreach ($pid as $key => $value) {
                $data = [
                    'invoice_id' => intval($invoice->id),
                    'product' => $product_name1[$key],
                    'qty' => $product_qty[$key],
                    'price' => $product_price[$key],
                    'tax' => $product_tax[$key],
                    'totaltax' => floatval($ptotal_tax[$key]),
                    'discount' => floatval($product_discount[$key]),
                    'totaldiscount' => $ptotal_disc[$key],
                    'subtotal' => floatval($product_subtotal[$key]),
                    'product_des' => $product_des[$key],

                ];
                //    dd($data['product_des']);
                Invoice_Item::create($data);
            }
            $request->session()->flash('alert-success', __('Invoice was successful added!'));
            return redirect()->back();

        } else {
            $arr['invoice'] = $invoice;
            $arr['customers'] = Customer::all();

            $arr['products'] = $products;
            return view('Acounting.Invoice.update_view', $arr);
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
    public function csearch(Request $request)
    {
        $result = array();
        $out = array();
        $name = $request->input('keyword');
        if ($name) {
            $result=Customer::where('company','like',$name.'%')->orWhere('name','like',$name.'%')->get();
           // dd($result);
            echo '<ol>';
            $i = 1;
            foreach ($result as $row) {
                echo "<li onClick=\"selectCustomer( '" . $row['id'] . "','" . addslashes($row['name']) . " ','" . addslashes($row['company']) . "','" . $row['phone'] . "','" . $row['email'] . "')\"><span>$i</span><p>" . $row['name'] . " &nbsp; &nbsp  " . $row['company'] . "</p></li>";
                $i++;
            }
            echo '</ol>';
        }

    }

    public function getcusinfo(Request $request)
    {
        $Customer = Customer::find($request->input('id'));
        $html = '
    <div class="col-lg-10">
        <div class="panel ">
            <div class="panel-body">
               <div class="form-group">
               <input type="hidden" name="customer_id" id="customer_id" value="' . $Customer->id . '">
                   <label><strong>' . _("Name") . '</strong>:' . $Customer->name . '</label><br>
                    <label><strong>' . _("Phone") . '</strong>:' . $Customer->phone . '</label><br>
                     <label><strong>' . _("Email") . '</strong>:' . $Customer->email . '</label><br>
                </div>
            </div>
        </div>
    </div>';
        return $html;

    }

    public function add(Request $request)
    {
        if (!self::permision('Invoice_Add')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $input = $request->all();
            $tid = $request->input('invocieno');//tid1
            $customer_id = $request->input('customer_id');//customer_id2
            $user_id = Auth::user()->id;//3
            $invoicedate = $request->input('invoicedate');//4
            $invocieduedate = $request->input('invocieduedate');//5
            $subtotal = $request->input('subtotal');//6
            $discount = $request->input('Totldiscount');
            $tax = $request->input('Totltax');
            $format_discount = $request->input('discountFormat');//7
            if ($format_discount == '0') {
                $discstatus = 0;//8
            } else {
                $discstatus = 1;
            }
            $taxstatus = $request->input('tax_handle');//10
            $total = $request->input('total');//11
            $notes = $request->input('notes');//12
            $data = [
                'tid' => intval($tid),
                'customer_id' => intval($customer_id),
                'user_id' => intval($user_id),
                'invoicedate' => $invoicedate,
                'invoiceduedate' => $invocieduedate,
                'subtotal' => floatval($subtotal),
                'discount' => floatval($discount),
                'discstatus' => floatval($discstatus),
                'format_discount' => $format_discount,
                'tax' => floatval($tax),
                'taxstatus' => $taxstatus,
                'total' => floatval($total),
                'notes' => $notes,
            ];
            $validator = Validator::make($request->all(), [
                'invocieno' => 'required|unique:invoices,tid,' . $input['invocieno']
            ]);
            if ($customer_id == 0) {
                $request->session()->flash('alert-danger', __('Please add a new client'));
                return redirect()->back();
            }
            if ($validator->fails()) {
                $request->session()->flash('alert-danger', __('invoices Number existed'));
                return redirect()->back();
            }
            $invoice = Invoice::create($data);
            if($invoice){
                $user=\App\User::where('id',1)->get();
              //  $user->notify(new Addinvoicenot($invoice));
             Notification::send($user,new Addinvoicenot($invoice));
            }
            $product_name1 = $request->input('product_name');
            $product_qty = $request->input('product_qty');
            $product_price = $request->input('product_price');
            $product_tax = $request->input('product_tax');
            $product_discount = $request->input('product_discount');
            $product_subtotal = $request->input('product_subtotal');
            $ptotal_tax = $request->input('taxa');
            $ptotal_disc = $request->input('disca');
            $product_des = $request->input('product_description');
            $pid = $request->input('pid');
            foreach ($pid as $key => $value) {
                $data = [
                    'invoice_id' => intval($invoice->id),
                    'product' => $product_name1[$key],
                    'qty' => $product_qty[$key],
                    'price' => $product_price[$key],
                    'tax' => $product_tax[$key],
                    'totaltax' => floatval($ptotal_tax[$key]),
                    'discount' => floatval($product_discount[$key]),
                    'totaldiscount' => $ptotal_disc[$key],
                    'subtotal' => floatval($product_subtotal[$key]),
                    'product_des' => $product_des[$key],

                ];
                Invoice_Item::create($data);
            }

            $request->session()->flash('alert-success', __('Invoice was successful added!'));
            return redirect()->back();
        } else {
            $lastinvoice = Invoice::withTrashed()->get()->count() == 0 ? 1000 : Invoice::withTrashed()->get()->max('tid');;
            $arr['customers'] = Customer::all();
            $arr['invoicedate'] = date('Y-m-d');
            $arr['invocieduedate'] = date('Y-m-d');
            $arr['lastinvoice'] = $lastinvoice + 1;
            return view('Acounting.Invoice.invoice_view', $arr);
        }
    }

    public function delete(Request $request, $id)
    {
        if (!self::permision('Invoice_Delete')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        $invoce = Invoice::find($id);
        if ($invoce->status != 'due') {
            $request->session()->flash('alert-danger', __('lang.You_cant_Delete_invoice'));
            return redirect()->back();
        }

            $invoce->delete();
            $request->session()->flash('alert-success', __('lang.Done'));

        return redirect()->back();
    }

    public function forcedelete(Request $request, $id)
    {
        if (!self::permision('Invoice_ForceDelete')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        $invoice = Invoice::onlyTrashed()->find($id);
        $invoice->forceDelete();
        $request->session()->flash('alert-success', __('lang.Done'));
        return redirect()->back();
    }

    public function restore(Request $request, $id)
    {
        if (!self::permision('Invoice_ForceDelete')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        $invoice = Invoice::onlyTrashed()->find($id);
        $invoice->restore();
        $request->session()->flash('alert-success', __('lang.Done'));
        return redirect()->back();


    }

    public function view(Request $request, $id)
    {
        $Invoice = Invoice::find($id);
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
        return view('Acounting.Invoice.View_invoice', $data);
    }

    public static function permision($pername)
    {
        if (!Auth::user()){
            return redirect(route('login'));
        }
        if (Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission([
                $pername,
            ])) {
            return true;
        } else {
            return false;
        }
    }
    public static function invpermision( $ob,$Type)
    {
        if(is_null($ob)){
            return false;
        }
        if (!Auth::user()){
            return redirect(route('login'));
        }
        if(Auth::user()->hasAnyRole(['Admin']) )
            return true;
        $Departmentname = $ob->Group->Division->Department->name;
        $Divisionname = $ob->Group->Division->name;
        $Groupname = $ob->Group->name;
            if(
                Auth::user()->hasAnyPermission([

                    'Department_' . $Departmentname . '_'.$Type,
                    'Department_'. $Departmentname .'_Division_' . $Divisionname . '_'.$Type,
                    'Department_'. $Departmentname .'_Division_' . $Divisionname .'_Group_'. $Groupname  . '_'.$Type,
                ]) )   {
                return true;
            }else{
                return false;
            }
    }

    public function printinvoice($id, $type)
    {
        $Invoice = Invoice::find($id);
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

    public function payment(Request $request, $id)
    {

        if (!self::permision('Payment_Add')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }

        $invoice = Invoice::find($id);

        $pamnt = $request->input('amount') + $invoice->pamnt;
        $Customer = Customer::find($invoice->customer_id);
        $balance=$Customer->balance;
        $status = 'due';
        if ($request->input('pmethod') == 'Card' or $request->input('pmethod') == 'Bank') {
            $request->session()->flash('alert-danger', __('lang.Service_is_currently_unavailable'));
            return redirect()->back();
        }
        if ($request->input('pmethod') == 'Cash') {
            if ($invoice->total == $pamnt) {
                $status = 'paid';
            } else {
                $status = 'partial';
            }

        } elseif ($request->input('pmethod') == 'Balance') {


            $balance = ($Customer->balance - $request->input('amount'));
            if ($balance < 0) {
                $request->session()->flash('alert-danger', __('lang.you_dont_have_balance'));
                return redirect()->back();
            }
            if ($invoice->total == $pamnt) {
                $status = 'paid';
            } else {
                $status = 'partial';
            }
            $Customer->update(
                [
                    'balance' => $balance,
                ]
            );
        }

        $data = [
            'pamnt' => $pamnt,
            'status' => $status,
            'pmethod' => $request->input('pmethod'),
        ];

        $invoice->update(
            $data
        );
        Transaction::create(
            [
                'customer_id' => $invoice->customer_id,
                'method' => $request->input('pmethod'),
                'date' => $request->input('paydate'),
                'type'=>'Income',
                'invoice_id' => $invoice->id,
                'user_id' => Auth::user()->id,
                'amount' => $request->input('amount'),
                'remaining' =>$balance,
                'note' => $request->input('shortnote'),
            ]
        );
        return redirect()->back();
    }

    public function recharg(Request $request, $id)
    {
        if (!self::permision('Balance_Add')) {
            $request->session()->flash('alert-danger', __('lang.You_dont_have_permision'));
            return redirect()->back();
        }
        $coustomer = Customer::find($id);
        $balance = $coustomer->balance + $request->input('amount');
        if ($request->isMethod('post')) {
            $coustomer->update(
                [
                    'balance' => $balance,
                ]
            );
           $bal= Balance::create([
                'amount' => $request->input('amount'),
                'user_id' => Auth::user()->id,
                'customer_id' => $id,
                'note' => $request->input('nots'),
                'date' => date('Y-m-d'),

            ]);
            Transaction::create(
                [
                    'customer_id' =>$id,
                    'date' =>date('Y-m-d'),
                    'type'=>'Deposit',
                    'balance_id'=>$bal->id,
                    'user_id' => Auth::user()->id,
                    'amount' => $request->input('amount'),
                    'remaining' => $balance,
                    'note' => $request->input('nots'),
                ]
            );
            return redirect()->back();
        } else {
            $tran = $coustomer->Balance;
            // dd($tran);
            $arr['coustomer'] = $coustomer;
            $arr['trans'] = $tran;
            return view('Crm.Customer.Recharg_view', $arr);
        }
    }

    public function sendemail(Request $request, $id, $type)
    {

        $Invoice = Invoice::find($id);
        if ($request->isMethod('post')) {
            //include("class.phpmailer.php");
            $Invoice = Invoice::find($id);
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
            require 'class.phpmailer.php';
            $name=$request->input('customername');
            $email=$request->input("mailtoc");
            $subject=$request->input("subject");
            $message=$request->input("message");
//dd($email);

            $mail = new \PHPMailer();
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->IsSMTP();
            $mail->SMTPAuth = true;

            $mail->Host ='mail.eritqaa.org'; //'mail.eritqaa.net';
            $mail->Username = 'noreply@eritqaa.org';//'noreply@eritqaa.net';
            $mail->Password = 'Noreply1234_';//'Noreply1234_';
            $mail->From = 'noreply@eritqaa.org';
           $mail->FromName = 'Eritqaa';
            $html2 = view('Acounting.Invoice.header-print', $data)->render();
            $html = view('Acounting.Invoice.view_print_rlt', $data)->render();
            $htmlContent = '<h2>Contact Request Submitted</h2>
                    <p><b>Name:</b> ' . $name . '</p>
                    <p><b>Email:</b> ' . $email . '</p>
                    <p><b>Phon:</b> ' . $subject . '</p>
                    <p>' . $message . '</p>
                    ';

            $mail->AddAddress($email,$name);
            $mail->Subject =$subject;
            $mail->Body =$message.'<br>'.$html2.$html ;//"This is a sample message using SMTP authentication";
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $str1= "gmail.com";
            $str2=strtolower('mail.eritqaa.org');
       //   dd($request->file('files'));
            $files=$request->file('files');
            if(!is_null($files))
            foreach ($request->file('files') as $file) {
                $name= $file->getClientOriginalName();
                $file->move(public_path().'/EmailSender/',$name);
                $mail->addAttachment(public_path().'/EmailSender/'.$name);

            }
            If(strstr($str2,$str1))
            {
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('Send  was successful added!'));
                }
                else {
                    $request->session()->flash('alert-danger', __('invoices Number existed'));
                }
            }
            else{
                $mail->Port = 25;
                if($mail->Send()) {
                    $request->session()->flash('alert-success', __('Send  was 111 successful added!'));
                    $file = new Filesystem();
                    $file->cleanDirectory(public_path().'/EmailSender');
                }
                else {
                    $request->session()->flash('alert-danger', $mail->ErrorInfo);
                }
            }
            return redirect()->back();
        }else {

            $Subject = 'Subject_Email_' . $type;
            $Message = 'Message_Email_' . $type;
            $arr['Subject'] = $Subject;
            $arr['Message'] = $Message;
            $arr['invoice'] = $Invoice;

            return view('Acounting.Invoice.sendemail_view', $arr);
        }

    }

    function sendRequest($site, $data)
    {
        $json = json_encode($data);
        $ch = curl_init($site);
        $header = array('Content-Type: application/json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function sendsms(Request $request, $id, $type)
    {
        $Invoice = Invoice::find($id);
        if ($request->isMethod('post')) {
            //include("class.phpmailer.php");
          //  dd($request->input('text_message'));
          //  dd($request->input('mobile'));

            $api_key  = '9b725bb0211f1c69735f0925eb03bd1f';            //ضع المفتاح الخاص بك الموجود بحسابك هنا
            $title    = 'ERiTQAA';      //ضع عنوان الارسال هنا .. يجب ان يكون فعال في حسابك
            $text	  = $request->input('text_message');    //محتوى الرسالة النصية هنا
            $sentto	  = $request->input('mobile'); //رقم الموبايل المستلم للرسالة
            $body = array("api_key" => $api_key, "title"=>$title, "text"=>$text,"sentto"=>$sentto);
            $result = $this->sendRequest('https://www.turkey-sms.com/api/v1/eritqaa/add-content', $body);
            $request->session()->flash('alert-success', __('lang.sendsms'));
            return redirect()->back();

        }else {


            $Message = 'Message_Sms_' . $type;

            $arr['Message'] = $Message;
            $arr['invoice'] = $Invoice;

            return view('Acounting.Invoice.sendsms_view', $arr);
        }

    }

    public function cancel(Request $request,$id){
        $invoice=Invoice::find($id);
        $invoice->update([
            'status'=>'canceled',
        ]);
        $request->session()->flash('alert-success', __('Invoice was successful cancel !'));
        return redirect()->back();
    }

    public function generate($id)
    {
        $Company = Company::find(1);
        $arr['company'] = $Company;
        $this->pdf->loadHtml(
            View::make('Acounting.Invoice.View_invoice', $arr)->render()
        );
        $this->pdf->render();
        return $this->pdf->output();
    }

    public function printinvoice1($id)
    {
        $temp_password = rand(200000, 999999);
        $pdf = new Invoice_cont();
        $output = $pdf->generate($id);
        Storage::put('Invoices/invoice' . $temp_password . 'pdf', $output);
        $headers = [
            '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>',
            'defult_font' => 'calibri',
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="invoice.pdf"'
        ];
        return response($output)->withHeaders($headers);
    }
}
