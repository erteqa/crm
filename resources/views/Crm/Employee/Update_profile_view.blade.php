@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Update_ProfileImag')}}
@endsection
@section('content')


    <form method="post" action="{{route('UploadProfile',['id'=>$employee->id])}}" enctype="multipart/form-data">
        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  {{__('lang.Update_ProfileImag')}}
                </div>
                <div class="panel-body">
                    {{csrf_field()}}
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>

                            <th>{{__('lang.Name') }}</th>
                            <th>{{__('lang.Files') }}</th>
                            <th>{{__('lang.Action') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                                <tr class="odd gradeX">
                                    <td>{{__('lang.profile_pic')}}</td>
                                    <td>
                                        <a href="{{utf8_encode(asset('Signature/'.$employee->profile_pic))}}">
                                            <img src="{{utf8_encode(asset('Signature/'.$employee->profile_pic))}}"
                                                 alt="{{$employee->profile_pic}}" style="width: 100px; height: 100px"></a>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="btn btn-primary"  type="file" name="profile_pic" value="upload">
                                        </div>


                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>{{__('lang.Signature')}}</td>
                                    <td>
                                        <a href="{{urlencode(utf8_encode(asset('Signature/'.$employee->Signature)))}}">
                                            <img src="{{utf8_encode(asset('Signature/'.$employee->Signature))}}"
                                                 alt="{{$employee->Signature}}" style="width: 100px; height: 100px"></a>

                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input class="btn btn-primary"  type="file" name="Signature" value="upload" >
                                        </div>


                                    </td>
                                </tr>
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
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>

        </div>
    </form>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection