@extends("layouts.Admin_app")

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{__('lang.import_Export_to_Excel_and_CSV')}} </h1>
            </div>
            <form method="post" action="{{route('DownloadExcel')}}">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__('lang.Group_Name') }}</label>
                    <select class="js-example-basic-single form-control"  name="group_id">
                      <option value="">{{__('lang.All_Customers')}}</option>
                        @if(!is_null($groups))
                            @foreach($groups as $group)
                                @if(\App\Http\Controllers\Admin\Group_cont::permision($group,'View')|| $group->name =='Default')

                                        <option  value="{{$group->id}}">{{$group->name}}</option>

                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>{{__('lang.Type') }}</label>
                    <select class="js-example-basic-single form-control" name="type">


                                    <option  value="xls">xls</option>
                                    <option  value="xlsx">xlsx</option>

                    </select>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
                   <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{__('lang.FileName') }}</th>
                        <th>{{__('lang.Delete') }}</th>
                        <th>{{__('lang.Download') }}</th>




                    </tr>
                    </thead>
                    <tbody id="activity">
                    @foreach ($files as $file)
                        <tr>
                            <td> <a href="{{$file}}">{{$file}}</a></td>
                            <td>
                                <a href="{{route('Deletefilebackup',['file'=>$file])}}">{{__('lang.Delete') }}</a>
                            </td>
                            <td>
                                <a href="{{route('Downloadsbackup',['file'=>$file])}}"> {{__('lang.Download') }}</a>
                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>

            </form>
        </div>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#customer-box").change(function () {

            var id = $(this).val();
            $.ajax({
                type: "post",
                url: '{{route('GetCustomer')}}',
                data: {_token: '{{csrf_token()}}', id: id},
                success: function (data) {

                    $("#customer-box-result").show();
                    $("#customer-box-result").html(data);


                }
            });
        });

    });
</script>
@endsection
@section('subject')
    Subject !!!!!!!!!!!
@endsection