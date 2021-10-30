@extends("layouts.Admin_app")

@section('content')
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Lesson_Editor') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="{{route('Lesson.Add',['id'=>$Coursid])}}">{{__('lang.Lesson_Add') }}</a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.title') }}</th>
                        <th>{{__('lang.teacher') }}</th>
                        <th>{{__('lang.timeshow') }}</th>

                        <th>{{__('lang.time') }}</th>

                        <th>{{__('lang.link') }}</th>
                        <th>{{__('lang.Add_By') }}</th>
                        <th>{{__('lang.date') }}</th>
                        <th>{{__('lang.Action') }}</th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    @foreach($Lessons as $Lesson)

                            <tr class="odd gradeX">

                            <td>{{$i}}</td>
                            <td>{{$Lesson->name}}</td>
                            <td>{{$Lesson->teacher}}</td>
                            <td>{{$Lesson->timeshow}}</td>
                            <td>{{$Lesson->time}}</td>

                            <td><a href="{{$Lesson->link}}" target="_blank">{{__('lang.linkopen') }}</a></td>
                            <td>{{\App\User::find($Lesson->addby)->name}}</td>
                            <td>{{$Lesson->date}}</td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('{{route('Lesson.Delete',['id'=>$Lesson->id])}}')">{{__('lang.Delete')}}</a>
                                            <a class="btn btn-warning" href="{{route('Lesson.Update',['id'=>$Lesson->id])}}">{{__('lang.Update')}}</a>
                                            <a class="btn btn-warning" href="{{route('Part.Index',['id'=>$Lesson->id])}}">{{__('lang.View')}}</a>
                                     </td>
                        </tr>
                        <?php $i++;?>
                    @endforeach
                    </tbody>
                </table>
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
@endsection
@section('subject')


@endsection