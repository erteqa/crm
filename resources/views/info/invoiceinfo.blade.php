<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.Invoice_Number') }}</th>
                    <th>{{__('lang.Customer') }}</th>
                    <th>{{__('lang.Employee') }}</th>
                    <th>{{__('lang.invoicedate') }}</th>
                    @if(auth()->user()->department_id != 3 or auth()->user()->department_id != 6 )
                        <th>{{__('lang.Company') }}</th>
                    @else
                        <th>{{__('lang.Degreestudy') }}</th>
                    @endif

                    <th>{{__('lang.status') }}</th>
                    <th>{{__('lang.Remaining_amount') }}</th>
                    <th>{{__('lang.Action') }}</th>

                </tr>
                </thead>
                <?php $i=1?>
                <tbody>
                @foreach($invoices as $invoice)
                    @if( \App\Http\Controllers\Accounting\Invoice_cont::invpermision($invoice->Customer,'View'))
                        @if($invoice->trashed())
                            <tr class="danger" class="odd gradeX">
                        @else
                            <tr class="odd gradeX">
                                @endif

                                <td>{{$i++}}</td>
                                <td>{{$invoice->tid}}</td>

                                <td>{{is_null($invoice->Customer)?'':$invoice->Customer->name}}</td>
                                <td>{{$invoice->User->name}}</td>
                                <td>{{$invoice->invoicedate}}</td>
                                <td>{{$invoice->Customer->company}}</td>
                                <td><span class="tag tag-default st-{{$invoice['status']}}">{{__('lang.'.$invoice['status']) }}</span></td>
                                <td>{{$invoice->total-$invoice->pamnt.' TL'}}</td>


                                @if($invoice->trashed())

                                    <td style="width: 210px">
                                        @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_ForceDelete'))
                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Invoice.ForceDelete',['id'=>$invoice->id])}}')">{{__('lang.Force_Delete') }}</a>

                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Invoice.Restor',['id'=>$invoice->id])}}')">{{__('lang.Restor') }}</a>
                                        @endif
                                    </td >
                                @else
                                    <td style="width: 210px">

                                        @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Delete'))
                                            <a class="btn btn-danger" onclick="del('{{route('Invoice.Delete',['id'=>$invoice->id])}}')">{{__('lang.Delete') }}</a>
                                        @endif

                                        @if( \App\Http\Controllers\Accounting\Invoice_cont::permision('Invoice_Update'))
                                            <a class="btn btn-warning" href="{{route('Invoice.Update',['id'=>$invoice->id])}}">{{__('lang.Update') }}</a>
                                        @endif

                                        <a class="btn btn-warning" href="{{route('Invoice.View',['id'=>$invoice->id])}}">{{__('lang.View') }}</a>

                                        <a class="btn btn-warning" href="{{route('Invoice.Download',['id'=>$invoice->id,'type' => 'd'])}}">{{__('lang.Download') }}</a>


                                    </td>
                                @endif





                            </tr>
                        @endif
                        @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>