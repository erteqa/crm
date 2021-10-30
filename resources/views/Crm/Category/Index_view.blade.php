@extends("layouts.Admin_app")

@section('content')
    <style>

    </style>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Category_Editor') }}
                <a href="{{route('Article.Index',['type'=>'UN'])}}">{{__('lang.Article_Index')}}</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('lang.name') }}</th>
                        <th>{{__('lang.Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    @foreach($Cats as $cat)
                          <tr class="odd gradeX">

                            <td>{{$i}}</td>
                            <td>{{$cat->name}}</td>
                                    <td style="width: 210px">
                                            <a class="btn btn-danger" onclick="del('{{route('Category.Delete',['id'=>$cat->id])}}')">{{__('lang.Delete')}}</a>
                                    </td>


                        </tr>
                        <?php $i++;?>
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
@endsection
@section('subject')


@endsection