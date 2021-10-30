@extends("layouts.Admin_app")

@section('content')
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Course_Editor') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary" style="margin-bottom: 10px"
                   href="{{route('Course.Add')}}">{{__('lang.Course_Add') }}</a>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thed>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.title') }}</th>
                        <th>{{__('lang.teacher') }}</th>
                        <th>{{__('lang.writer') }}</th>
                        <th>{{__('lang.category') }}</th>
                        <th>{{__('lang.difficulty') }}</th>
                        <th>{{__('lang.hashtag') }}</th>
                        <th>{{__('lang.link') }}</th>
                        <th>{{__('lang.Add_By') }}</th>
                        <th>{{__('lang.date') }}</th>
                        <th>{{__('lang.Action') }}</th>
                    </tr>
                    </thed>
                    <tbody>
                    <?php $i=1;?>
                    @foreach($Courses as $Course)

                            <tr class="odd gradeX">

                            <td>{{$i}}</td>
                            <td>{{$Course->title}}</td>
                            <td>{{$Course->teacher}}</td>
                            <td>{{$Course->writer}}</td>
                            <td>{{$Course->category}}</td>
                            <td>{{$Course->difficulty}}</td>
                            <td>{{$Course->hashtag}}</td>
                            <td><a href="{{$Course->link}}" target="_blank">{{__('lang.linkopen') }}</a></td>
                            <td>{{\App\User::find($Course->addby)->name}}</td>
                            <td>{{$Course->date}}</td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('{{route('Course.Delete',['id'=>$Course->id])}}')">{{__('lang.Delete')}}</a>
                                            <a class="btn btn-warning" href="{{route('Course.Update',['id'=>$Course->id])}}">{{__('lang.Update')}}</a>
                                            <a class="btn btn-warning" href="{{route('Lesson.Index',['id'=>$Course->id])}}">{{__('lang.View')}}</a>
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