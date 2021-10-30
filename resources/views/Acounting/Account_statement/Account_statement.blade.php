
@extends("layouts.Admin_app")
@section('content')
    <style>
        .st-paid, .st-due, .st-partial, .st-canceled,.st-rejected,.st-pending,.st-accepted,.st-Recurring,.st-Stopped
        {
            text-transform: capitalize;
            color: #fff;
            padding: 4px;
            border-radius: 11px;
            font-size: 12px;
        }
        .st-paid,.st-accepted
        {
            background-color: #5ed45e;
        }
        .st-due,.st-Stopped
        {
            background-color: #ff6262;
        }
        .st-partial,.st-pending,.st-Recurring
        {
            background-color: #5da6fb;
        }
        .st-canceled,.st-rejected
        {
            background-color: #848030;
        }
    </style>
    <?php $total=0; $payment=0;$remaining=0;?>
    <div class="col-lg-12">
        <form method="post" action="{{route('Summery.Download')}}">
            @csrf
            <input type="hidden" value="{{$customer->id}}" name="customer_id" >
            <input type="hidden" value="{{$trans_type}}" name="trans_type">
            <input type="hidden" value="{{$sdate}}" name="sdate">
            <input type="hidden" value="{{$edate}}" name="edate">
            <div class="col-sm-4">
                <input type="submit" class="btn btn-success btn-md" value="{{__('Download')}}">
            </div>
        </form>
        <div class="panel panel-primary">

            <div class="panel-heading">
                <div  style="text-align: center;font-weight:bold;"><span >  {{__('lang.Customer_Summary') }}</span></div>


            </div>
            <table class="party">
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
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                        <?php if($invoice->status !='canceled'){$total+=$invoice->total;$payment+=$invoice->pamnt;}?>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div  style="text-align: center;font-weight:bold;"><span >{{__('lang.transaction')}}</span></div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                            <table class="table">
                                <thead>
                                <tr>

                                    <th>{{__('lang.suminvoice')}}</th>
                                    <th>{{__('lang.allpayment')}}</th>
                                    <th>{{__('lang.remaining')}}</th>
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
        <!-- /.panel -->
    </div>
@endsection
@section('subject')


@endsection