<div class="col-lg-12">
    <div class="panel panel-primary">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('lang.addby') }}</th>
                    <th>{{__('lang.customername') }}</th>
                    <th>{{__('lang.content') }}</th>
                    <th>{{__('lang.created_at') }}</th>
                    <th>{{__('lang.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>

                @foreach($customer->Not as $not)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$not->User->name}}</td>
                        <td>{{$not->Customer->name}}</td>
                        <td>{{$not->content}}</td>
                        <td>{{$not->created_at}}</td>
                        <td style="width: 23%">
                            @if(auth()->user()->id===$not->user_id)
                                <a class="btn btn-danger"
                                   onclick="del('{{route('Notes.Delete',['id'=>$not->id])}}')">{{__('lang.Delete') }}</a>

                                <button class="btn btn-success"
                                        onclick="open1dialogupdate({{"'".$not->content."',".$not->id}})">{{__('lang.Update')}}</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
            <script>

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
