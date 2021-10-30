
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
    table{
        width: 100%;
    }
    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
<!-- Table goes in the document BODY -->
<?php $total=0; $payment=0;$remaining=0;?>
<table class="center">
    <tr class="center">
        <td class="center" >
            <img alt="Paris" class="center" style="max-width:260px;" src="{{ public_path() . '/Images/logo.png' }}">
        </td>
    </tr>
</table>
<div class="panel panel-primary">

    <div class="panel-heading">
        <div  style="text-align: center;font-weight:bold;"><span >  {{__('lang.Customer_Summary') }}</span></div>

    </div>

    <table class="gridtable">
        <thead>
        <tr class="heading">
            <th> {{__('lang.Our_Info')}}:</th>
            <th>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>{{__('lang.Customer')}}:</th>
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
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <strong>{{$customer['name'] }}</strong><br>
                {{$customer['company']?$customer['company']:'' }}<br>
                {{ $customer['address']}} <br>{{$customer['company']}} ,
                {{$customer['passport_number']}} <br>{{__('lang.Phone')}}:
                {{$customer['phone']}} <br>{{__('lang.Email')}}  :  {{$customer['email']}}
            </td>
        </tr>
        </tbody>
    </table>
    <div  style="text-align: center;font-weight:bold;"><span >{{__('lang.Inovices')}}</span></div>
    <div class="panel-body">
        <table width="100%" class="gridtable table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('lang.Invoice_Number') }}</th>
                <th>{{__('lang.Employee') }}</th>
                <th>{{__('lang.invoicedate') }}</th>
                <th>{{__('lang.status') }}</th>
                <th>{{__('lang.Remaining_amount') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($invoices as $invoice)
                <tr class="odd gradeX">
                    <td>{{$i++}}</td>
                    <td>{{$invoice->tid}}</td>

                    <td>{{$invoice->User->name}}</td>
                    <td>{{$invoice->invoicedate}}</td>

                    <td><span class="tag tag-default st-{{$invoice['status']}}">{{__('lang.'.$invoice['status']) }}</span></td>
                    <td>{{$invoice->total - $invoice->pamnt.' TL'}}</td>
                <?php $total+=$invoice->total;$payment+=$invoice->pamnt?>
            @endforeach
            </tbody>
        </table>

    </div>
    <div  style="text-align: center;font-weight:bold;"><span >{{__('lang.transaction')}}</span></div>
    <div class="panel-body">
        <table width="100%" class="gridtable table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('lang.Add_By') }}</th>
                <th>{{__('lang.Amount') }}</th>
                <th>{{__('lang.type') }}</th>
                <th>{{__('lang.method') }}</th>
                <th>{{__('lang.remaining') }}</th>
                <th>{{__('lang.Note') }}</th>
                <th>{{__('lang.Date') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($Transactions as $Transaction)
                <tr class="odd gradeX">
                    <td>{{$i++}}</td>
                    <td>{{$Transaction->User->name}}</td>
                    <td>{{$Transaction->amount}}</td>
                    <td>{{__('lang.'.$Transaction->type)}}</td>
                    <td>{{$Transaction->method ==null?'':__('lang.'.$Transaction->method)}}</td>
                    <td>{{$Transaction->remaining}}</td>
                    <td>{{$Transaction->note}}</td>
                    <td>{{$Transaction->date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.panel-body -->
    <div style="margin: 5px">

    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div  style="text-align: center;font-weight:bold;"><span > {{__('lang.result')}}</span></div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="gridtable table">
                        <thead>
                        <tr>

                            <th>{{__('lang.suminvoice')}}</th>
                            <th>{{__('lang.allpayment')}}</th>
                            <th>{{__('lang.tlremaining')}}</th>
                            <th>{{__('lang.oldbalance')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$total.' TL'}}</td>
                            <td>{{$payment.' TL'}}</td>
                            <td>{{$total-$payment.' TL'}}</td>
                            <td>{{$customer->balance.' TL'}}</td>
                        </tr>

                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>