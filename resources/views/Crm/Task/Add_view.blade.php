@extends("layouts.Admin_app")
@section('title')
    {{__('lang.Add_Task') }}
@endsection
@section('content')
    <style>
        @if(app()->getLocale()=='ar')
        form {
            text-align: right;
        }

        input {
            text-align: right;
        }

        textarea {
            text-align: right;
        }

        @endif

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }
        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }
        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div class="col-lg-10">
        <button class="btn btn-primary" onclick="showformtask()">{{__('lang.addtasktype')}}</button>
    <form method="post">


        <div class="panel panel-primary">
            <div class="panel-heading">
                {{__('lang.Add_Task') }}
            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="panel-body">

               <div class="form-group">
                   {{csrf_field()}}
                   <label>{{__('lang.Name') }}</label>
                   <input type="text" name="name" placeholder="{{__('lang.Task_Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" required >
               </div>
                <div class="form-group">
                    <label>{{__('lang.TaskType_Name') }}</label>
                    <select class="js-example-basic-single form-control" id="select_id" name="task_type_id">
                        {{--<option value="">Empty</option>--}}
                        @if(!is_null($tasktyps))
                            @foreach($tasktyps as $tasktyp)
                                @if(!is_null($tasktyp))
                                <option  value="{{$tasktyp->id}}" >{{$tasktyp->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>{{__('lang.Employee_Name') }}</label>
                    <select class="js-example-basic-single form-control" name="user_id" required>
                        @if(!is_null($employees))
                            @foreach($employees as $employee)
                                @if(!is_null($employee))
                                    <option  value="{{$employee->id}}" >{{$employee->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>{{__('lang.Customers_Name') }}</label>
                    <select class="js-example-basic-single form-control" name="customer_id" required>
                        @if(!is_null($customers))
                            @foreach($customers as $customer)
                                @if(\App\Http\Controllers\Admin\Customer_cont::permision($customer,'View'))
                                @if(!is_null($customer))
                                    <option  value="{{$customer->id}}" >{{$customer->name}} : {{$customer->company}}</option>
                                @endif
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>{{__('lang.state_Name') }}</label>
                    <select class="js-example-basic-single form-control" name="state_id"  required>
                        @if(!is_null($status))
                            @foreach($status as $state)
                                @if(!is_null($state))
                                    <option  value="{{$state->id}}" >{{$state->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">

                    <label>{{__('lang.Duration') }}</label>
                    <input type="text" name="duration" placeholder="{{__('lang.Duration') }}" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}"   value="{{ old('duration') }}" >
                </div>
                <div class="form-group">
                    <label>{{__('lang.Description') }}</label>
                    <input type="text" name="description" placeholder="{{__('lang.Description') }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"   value="{{ old('description') }}" >
                </div>
            </div>
            <div class="panel-footer">
               <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
        <div class="col-lg-6">
            <div id="my1" class="modal">
                <div class="modal-content">
                    <span class="clos1e">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">

                            <label>{{__('lang.Name') }}</label>
                            <input id="tasktype" type="text" name="name" placeholder="{{__('lang.Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   value="{{ old('name') }}" required ><br>
                            <button class="btn btn-danger" onclick="stortasktype()">{{__('lang.addtasktype')}}</button>
                        </div>
                    </div>

                    <script>
                        // Get the modal
                        var m1odal = document.getElementById("my1");

                        var s1pan = document.getElementsByClassName("clos1e")[0];

                        stortasktype = function () {
                            var  name=$("#tasktype").val();
                           // alert(name);
                            $.ajax({
                                type: "get",
                                url: '{{route('TaskType.Addajax')}}',
                                data: {_token: '{{csrf_token()}}', name: name},
                                success: function (data) {
                                    $("#select_id").prepend(data);
                                    m1odal.style.display = "none";
                                    //alert(data);
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
                        }

                        showformtask = function () {
                            m1odal.style.display = "block";
                            if (event.stopPropagation) event.stopPropagation();

                        }

                        // Whn the user clicks on <span> (x), close the modal
                        s1pan.onclick = function () {
                            m1odal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function (event) {
                            //  alert('faefewf');
                            if (event.target == m1odal) {
                                m1odal.style.display = "none";
                            }

                        }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('subject')
    {{__('lang.Subject') }}}}
@endsection