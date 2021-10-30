<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            {{__('lang.Customer_Summary') }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.Add_By') }}</th>
                    <th>{{__('lang.Amount') }}</th>
                    <th>{{__('lang.Note') }}</th>
                    <th>{{__('lang.Date') }}</th>
                    <th>{{__('lang.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                @foreach($Expenses as $Expense)

                    @if(\App\Http\Controllers\Accounting\Expense_cont::permision('View'))
                        @if($Expense->trashed())
                            <tr class="danger" class="odd gradeX">
                        @else
                            <tr class="odd gradeX">
                                @endif

                                <td>{{$i++}}</td>
                                <td>{{$Expense->User->name}}</td>

                                <td>{{$Expense->amount}}</td>
                                <td>{{$Expense->note}}</td>
                                <td>{{$Expense->date}}</td>
                                {{--<td><a href="{{route('update.item',['id'=>$item->id])}}">update</a>--}}
                                @if($Expense->trashed())
                                    <td style="width: 23%">
                                        @if(\App\Http\Controllers\Accounting\Expense_cont::permision('ForceDelete'))
                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Expense.ForceDelete',['id'=>$Expense->id])}}')">{{__('lang.Force_Delete') }}</a>
                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Expense.Restor',['id'=>$Expense->id])}}')">{{__('lang.Restor') }}</a>
                                        @endif

                                    </td>
                                @else
                                    <td style="width: 23%">
                                        @if(\App\Http\Controllers\Accounting\Expense_cont::permision('Delete'))
                                            <a class="btn btn-danger"
                                               onclick="del('{{route('Expense.Delete',['id'=>$Expense->id])}}')">{{__('lang.Delete') }}</a>
                                        @endif
                                        {{--@if(\App\Http\Controllers\Accounting\Expense_cont::permision('Update'))--}}
                                        {{--<a class="btn btn-warning"--}}
                                        {{--href="{{route('Expense.Update',['id'=>$Expense->id])}}">{{__('lang.Update') }}</a>--}}
                                        {{--@endif--}}
                                        <a class="btn btn-warning"
                                           href="{{route('Expense.View',['id'=>$Expense->id])}}">{{__('lang.View') }}</a>
                                    </td>
                                @endif


                            </tr>

                        @endif
                        @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                });

                function del($url) {
                    var $ret_val = confirm('Yes Or No');
                    if ($ret_val == true) {
                        window.location.href = $url;
                    }

                }
            </script>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>