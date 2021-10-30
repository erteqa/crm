@include('Acounting.Invoice.header-print')
<!doctype html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Invoice #<?php echo $invoice['tid'] ?></title>

    <style>

        body {
            color: #2B2000;
            font-family: 'Helvetica';

        }
        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin:auto ;
            padding-right: 4mm;
            padding-left: 4mm;
            padding-bottom: 4mm;
            padding-top: 0mm;
            border: 0;
            font-size: 12pt;
            line-height: 0pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: right;
            border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }

        .subtotal tr td {
            line-height: 10pt;
            padding: 6pt;


        }

        .subtotal tr td {

            border: 1px solid #ddd;

        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
            margin-right:20pt;
        }

        .invoice-box table td {
            padding: 10pt 4pt 8pt 4pt;
            vertical-align: top;

        }

        .invoice-box table.top_sum td {
            padding: 0;
            font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;

        }

        table tr.details td {
            padding-bottom: 20pt;
        }

        .invoice-box table tr.item td{
            border: 1px solid #ddd;
        }

        table tr.b_class td{
            border-bottom: 1px solid #ddd;
        }

        table tr.b_class.last td{
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 400pt;
        }

        .myco2 {
            width: 300pt;
        }

        .myw {
            width: 240pt;
            font-size: 14pt;
            line-height: 14pt;

        }

        .mfill {
            background-color: #eee;
        }

        .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;

        }
        .party {
            border: #ccc 1px solid;
        }


    </style>
</head>

<body dir="rtl">

<div class="invoice-box">


    <br>
    <table class="party">
        <thead>
        <tr class="heading">
            <td> {{__('lang.Our_Info')}}:</td>

            <td>{{__('lang.Customer')}}:</td>
        </tr>
        </thead>
        <tbody>
        <tr>


            <td>
               <strong>{{$company['name'] }}</strong>
                {{$company['company']?$company['company']:'' }}<br>
               {{ $company['address']}} <br>{{$company['city']}} ,
                 {{$company['region']}} <br> {{$company['country']}}
                {{$company['postbox']}} <br>{{__('lang.Phone')}}:
                {{$company['phone']}} <br>{{__('lang.Email')}}  :  {{$company['email']}}
            </td>
            <td><strong>{{$customer['name'] }}</strong><br>
                {{$customer['company']?$customer['company']:'' }}<br>
                {{ $customer['address']}} <br>{{$customer['company']}} ,

                {{$customer['passport_number']}} <br>{{__('lang.Phone')}}:
                {{$customer['phone']}} <br>{{__('lang.Email')}}  :  {{$customer['email']}}
            </td>
        </tr><?php if ($invoice['name']) { ?>

        <tr>


        </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="plist" cellpadding="0" cellspacing="0">


        <tr class="heading">
            <td>
               {{__('lang.Description')}}
            </td>

            <td>
                {{__('lang.Price') }}
            </td>
            <td>
               {{__('lang.Qty') }}
            </td>

            <?php if ($invoice['tax'] > 0) echo '<td>' . __('lang.Tax') . '</td>';

            if ($invoice['discount'] > 0) echo '<td>' .__('lang.Discount') . '</td>'; ?>
            <td class="t_center">
                <?php echo __('lang.SubTotal') ?>
            </td>
        </tr>

        <?php $i = 1;
        $fill = true;
        $sub_t=0;
        foreach ($products as $row) {
            $sub_t+=$row['price']*$row['qty'];
            $cols = 3;
            $border='';
            $border2='';
            if ($fill == true) {
                $flag = ' mfill';
                $border='b_class';
                if($row['product_des'])  { $border=''; $border2='b_class'; }
            } else {
                $flag = '';
            }


            echo '<tr class="item' . $flag . ' '.$border.'">
                            <td>' . $row['product'] . '</td>
							<td style="width:12%;">' . $row['price'] . '</td>
                            <td style="width:12%;" >' . $row['qty'] . '</td>   ';
            if ($invoice['tax'] > 0)  { $cols++; echo '<td style="width:16%;">' . $row['totaltax'] . ' <span class="tax">(' . $row['tax'] . '%)</span></td>'; }
            if ($invoice['discount'] > 0) {   $cols++; echo ' <td style="width:16%;">' . $row['totaldiscount']. '</td>'; }
            echo '<td class="t_center">' . $row['subtotal'] . '</td>
                        </tr>';
            if($row['product_des'])  { $cc=$cols+1; echo '<tr class="item' . $flag . ' '.$border2.' descr">
                            <td colspan="'.$cc.'">' . $row['product_des'] . '<br>&nbsp;</td>

                        </tr>'; }
            $fill = !$fill;
            $i++;
        }



        ?>


    </table>
    <br>
    <table class="subtotal">


        <tr>
            <td class="myco2" rowspan="<?php echo $cols ?>"><br><br><br>
                <p><?php echo  '<strong>' .__('lang.'.ucwords($invoice['status'])).'</strong> :'. __('lang.Status') . '</p><br><p>' .(floatval( $invoice['total'])- floatval($invoice['pamnt'])). ' :'. __('lang.Total_Amount') . '</p><br><p> ' .$invoice['pamnt'].' :' . __('lang.Paid_Amount') ; ?></p>
            </td>
            <td><strong><?php echo __('lang.Summary') ?>:</strong></td>
            <td></td>


        </tr>
        <tr class="f_summary">
            <td><?php echo __('lang.SubTotal') ?>:</td>
            <td><?php echo $invoice['subtotal'] ?></td>
        </tr>
        <?php if ($invoice['tax'] > 0) {
            echo '<tr>
            <td> ' . __('lang.Total_Tax') . ' :</td>

            <td>' . $invoice['tax']. '</td>
        </tr>';
        }
        if ($invoice['discount'] > 0) {
            echo '<tr>
            <td>' . __('lang.Total_Discount') . ':</td>
            <td>' . $invoice['discount'].'</td>
        </tr>';

        }
        ?>
        <tr>
        <td><?php echo __('lang.Balance_Rmain') ?>:</td>
        <td><?php echo $invoice->Customer->balance ?></td>
        </tr>





		</table>
    <br><div class="sign">{{__('lang.Authorized_person')}}</div>
<div class="sign1"><img  width="160" height="50" border="0" alt="" src="{{ public_path() . '/Signature/'. $employee->Signature}}"></div><div class="sign2">({{$employee['name']}})</div>
<div>{{ $invoice['notes']}} <hr><br>
    </div>
</div>
</body>
</html>
