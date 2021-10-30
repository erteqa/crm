<form method="post">
    <div class="col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Customer_Update') }}
            </div>
            <div class="panel-body">

                <div class="form-group">
                    {{csrf_field()}}
                    <label>{{__('lang.Name') }}</label>
                    <input type="text" name="name" placeholder="{{__('lang.Name') }}"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           value="{{ $customer->name}}" required>
                </div>

                <div class="form-group">
                    <label>{{__('lang.Group_Name') }}</label>
                    <select class="js-example-basic-single form-control" name="group_id" id="group_id">
                        {{--<option value="">Empty</option>--}}
                        @if(!is_null($groups))
                            @foreach($groups as $group)
                                @if(\App\Http\Controllers\Admin\Group_cont::permision($group,'Add')||\App\Http\Controllers\Admin\Group_cont::permision($group,'View'))
                                    @if(!is_null($customer->Group))
                                        <option {{$group->id==$customer->Group->id?'selected="selected"':''}}  value="{{$group->id}}">{{$group->name}}</option>
                                    @else
                                        <option value="{{$group->id}}">{{$group->name}}</option>

                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label>{{__('lang.Role') }}</label>
                    <select class="js-example-basic-single form-control" name="rolename" required id="rolename">
                        <option value="">Empty</option>
                        @if(!is_null($roles))
                            @foreach($roles as $role)
                                <option {{$customer->hasRole($role)?'selected="selected"':''}} value="{{$role->name}}" >{{$role->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <input type="submit" onclick="savedata({{$customer->id}},event)" class="btn btn-primary" value="Save">
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
        savedata = function (id,event) {
            event.preventDefault();
           var group_id= $("#group_id").val();
           var rolename=   $("#rolename").val();
            var id=id;
            $.ajax({
                type: "get",
                url: '{{route('Info.updatesave')}}',
                data: {_token: '{{csrf_token()}}', id: id,group_id:group_id,rolename:rolename},
                success: function (data) {
                   //  alert(data);
                    m1odalupdate.style.display = "none";
                    var rm = document.getElementById("CU."+id);
                    rm.remove();
                }, error: function (jqXHR, error, errorThrown) {
                    if (jqXHR.status && jqXHR.status == 400) {
                        alert(jqXHR.responseText);
                    } else {
                        alert("Something went wrong");
                    }
                }
            });
          //  m1odalupdate.style.display = "block";
            // if (event.stopPropagation) event.stopPropagation();
        }
    </script>
</form>
