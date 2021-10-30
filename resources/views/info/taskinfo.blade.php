<div class="panel panel-primary">

    <div class="panel-body">
        <a class="btn btn-primary" style="margin-bottom: 10px"
           href="{{route('Task.Add')}}" target="_blank">{{__('lang.Add_Task') }}</a>
        <table width="100%" class="table table-striped table-bordered table-hover" >
            <thead>
            <tr>
                <th>{{__('lang.Name') }}</th>
                <th>{{__('lang.TaskType') }}</th>
                <th>{{__('lang.Employee') }}</th>
                <th>{{__('lang.Customer') }}</th>
                <th>{{__('lang.State') }}</th>
                <th>{{__('lang.Duration') }}</th>
                <th>{{__('lang.Description') }}</th>
                <th>{{__('lang.Created_at') }}</th>
                <th>{{__('lang.Action') }}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($Tasks as $Task)
                @if($Task->trashed())
                    <tr class="danger" class="odd gradeX">
                @else
                    <tr class="odd gradeX">
                        @endif

                        <td>{{$Task->name==''?'':$Task->name}}</td>
                        <td>{{is_null($Task->TaskType)?'':$Task->TaskType->name}}</td>
                        <td>{{is_null($Task->User)?'':$Task->User->name}}</td>
                        <td>{{is_null($Task->Customer)?'':$Task->Customer->name}}</td>
                        <td>
                            <div class="progress progress-striped active">
                                <div class="progress-bar {{\App\Http\Controllers\Style_cont::progress($Task->State->percent)}}"
                                     role="progressbar" aria-valuenow="{{$Task->State->percent}}"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width:{{$Task->State->percent}}%">
                                    <span class="sr-only">{{$Task->State->percent}} % Complete (warning)</span>
                                </div>
                            </div>
                        </td>

                        <td>{{$Task->duration}}</td>
                        <td>{{$Task->description}}</td>
                        <td>{{$Task->created_at}}</td>
                        <td>
                            @if($Task->trashed())
                                <a class="btn btn-danger"
                                   onclick="del('{{route('Task.ForceDelete',['id'=>$Task->id])}}')">{{__('lang.Force_Delete') }}</a>
                                <a class="btn btn-danger"
                                   onclick="del('{{route('Task.Restor',['id'=>$Task->id])}}')">{{__('lang.Restor') }}</a>
                            @else
                                <a class="btn btn-danger"
                                   onclick="del('{{route('Task.Delete',['id'=>$Task->id])}}')">{{__('lang.Delete') }}</a>
                                <a class="btn btn-warning" href="{{route('Task.Update',['id'=>$Task->id])}}">{{__('lang.Update') }}</a>
                                <a class="btn btn-warning"
                                   href="{{route('Task.View',['id'=>$Task->id])}}">{{__('lang.View') }}</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <!-- /.table-responsive -->
        {{--<script>--}}
        {{--$(document).ready(function () {--}}
        {{--$('#dataTables-example').DataTable({--}}
        {{--responsive: true--}}
        {{--});--}}

        {{--});--}}

        {{--function del($url) {--}}
        {{--var $ret_val = confirm('Yes Or No');--}}
        {{--if ($ret_val == true) {--}}
        {{--window.location.href = $url;--}}
        {{--}--}}

        {{--}--}}
        {{--</script>--}}
    </div>
    <!-- /.panel-body -->
</div>