@extends("layouts.Web_app")

@section('content')
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Course_joint') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.title') }}</th>
                        <th>{{__('lang.teacher') }}</th>
                        <th>{{__('lang.category') }}</th>
                        <th>{{__('lang.difficulty') }}</th>
                        <th>{{__('lang.link') }}</th>
                        <th>{{__('lang.date') }}</th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    @if(count($Courses)>0)
                    @foreach($Courses as $Course)
                        @if(auth()->guard('customer')->user()->hasAnyPermission([$Course->title]))
                            <tr class="odd gradeX">
                            <td>{{$i}}</td>
                            <td>{{$Course->title}}</td>
                            <td>{{$Course->teacher}}</td>
                            <td>{{$Course->category}}</td>
                            <td>{{$Course->difficulty}}</td>
                            <td><a href="{{route('Cu.Lesson.Index',['id'=>$Course->id])}}" target="_blank">{{__('lang.linkopen') }}</a></td>
                            <td>{{$Course->date}}</td>
                        </tr>
                        <?php $i++;?>
                            @endif
                    @endforeach
                    @endif
                    </tbody>
                </table>
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
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Course_Notjoint') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                        <tr>
                            <th>#</th>
                            <th>{{__('lang.title') }}</th>
                            <th>{{__('lang.teacher') }}</th>
                            <th>{{__('lang.category') }}</th>
                            <th>{{__('lang.difficulty') }}</th>
                            <th>{{__('lang.date') }}</th>

                        </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    @foreach($Other as $Course)

                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>{{$Course->title}}</td>
                                <td>{{$Course->teacher}}</td>
                                <td>{{$Course->category}}</td>
                                <td>{{$Course->difficulty}}</td>

                                <td>{{$Course->date}}</td>
                            </tr>
                            <?php $i++;?>

                    @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function () {
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            stateSave: true
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
@endsection
@section('subject')


@endsection