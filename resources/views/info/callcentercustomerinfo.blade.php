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

    span {
        text-align: right;
    }

    .lolo {
        text-align: right;
        float: right;
    }

    .memo {
        text-align: right;
    }

    @else
     .memo {
        text-align: left;
    }

    .lolo {
        text-align: left;
        float: left;
    }

    @endif
        body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .myBox1 {

        border: none;
        font: 14px/24px sans-serif;
        height: 582px;
        overflow-y: scroll;

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
        width: 64%;
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

    .Mytextarea {
        border-color: #ea2612;
    }

    .Mytextarea:focus {
        border-color: #ea0e20;
        border: 1px;
    }

    .thumbnail {
        padding: 0px;
    }

    .panel {
        position: relative;
    }

    .panel > .panel-heading:after, .panel > .panel-heading:before {
        position: absolute;
        top: 11px;
        left: -16px;
        right: 100%;
        width: 0;
        height: 0;
        display: block;
        content: " ";
        border-color: transparent;
        border-style: solid solid outset;
        pointer-events: none;
    }

    .panel > .panel-heading:after {
        border-width: 7px;
        border-right-color: #f7f7f7;
        margin-top: 1px;
        margin-left: 2px;
    }

    .panel > .panel-heading:before {
        border-right-color: #ddd;
        border-width: 8px;
    }
</style>
<?php
$cuid = $Customers->id;
?>
<div class="col-md-6" style="padding-right:3px;padding-left:3px;">
    <div class="myBox1 well">
        <div id="info">
            @foreach($notes= $Customers->Not as $note)
                <div id="D_{{$note->id}}" class="row">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo"
                                 src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->
                    <div class="col-sm-11">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <strong>{{$note->User->name}}</strong> <span style="margin-left: 6%;"
                                                                             class="text-muted">{{$note->created_at}}</span>
                                @auth
                                    @if($note->User->id==\Illuminate\Support\Facades\Auth::user()->id or \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['Admin']))
                                        <span style="margin-left: 12%;">
                         <a style="margin-left: 22%;color: green" onclick="updatnote({{$note->id}})">Edite</a>
                        <a style="margin-left: 5%;color: red" onclick="deletnot({{$note->id}})">Delete</a>
                                    </span>
                            </div>
                            @endif
                            @endauth
                            <div id="UP_{{$note->id}}" class=" memo  panel-body">
                                {!! str_replace(array("\n"),"<br>",$note->content) !!}
                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div><!-- /col-sm-5 -->
            @endforeach
        </div>
        <div id="addcoment"></div>
        <a class="btn btn-primary lolo" onclick="addnot()">{{__('lang.New_Note')}}</a>

        <div id='commantadd' style="display:none; border:#2c4762 thin dashed" class="row">
            <div class="col-md-12">
                <div>
                    <a type="submit" onclick="notypeopen1dialog()" class="btn btn-primary Mytextarea"
                       style="border-radius: 15px" id="sendMessageButton">Add Type</a>
                </div>
                <form method="post" class="addform">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group">
                            <label>{{__('lang.notetype') }}</label>
                            <select class="js-example-basic-single form-control" id="nottype_id" required>
                                @foreach(\App\Model\Notetype::all() as $nottype)
                                    <option value="{{$nottype->id}}">{{$nottype->typename}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group floating-label-form-group controls">
                            <label>{{__('lang.Add_note')}}</label>
                            <textarea class="form-control" id="addcontent" name="content"
                                      placeholder="{{__('lang.Add_note')}}" required
                                      data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <a type="submit" onclick="addcoment()" class="btn btn-primary Mytextarea"
                           style="border-radius: 15px" id="sendMessageButton">Add</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function addnot() {
        var commantadd = document.getElementById("commantadd");
        if (commantadd.style.display == 'none') {
            commantadd.style.display = 'block';
        } else {
            commantadd.style.display = 'none';
        }
    }

    updatnote = function (id, event) {
        var content = $("#UP_" + id).html();
        $("#content").val(content);
        $("#notid").val(id);
        var modal4 = document.getElementById("my4");
        modal4.style.display = "block";
        if (event.stopPropagation) event.stopPropagation();
    }

    function deletnot(id, event) {
        var $ret_val = confirm('Yes Or No');
        if ($ret_val == true) {
            $("#D_" + id).html('');
            $.ajax({
                type: "get",
                url: '{{route('Info.delete')}}',
                data: {_token: '{{csrf_token()}}', id: id},
                success: function (data) {
                }, error: function (jqXHR, error, errorThrown) {
                    if (jqXHR.status && jqXHR.status == 400) {
                        alert(jqXHR.responseText);
                    } else {
                        alert(error.Message)
                    }
                }
            })
        }
    }

    function addcoment() {
        var content = $("#addcontent").val();
        if (content === '') {
            $('#addcoment').html("<p id='message' class='alert alert-warning'><span style='float: right' class='close5'>&times;</span> لم يتم استكمال المعلومات الضرورية </p>");
            var message = document.getElementById("message");
            var span5 = document.getElementsByClassName("close5")[0];
            span5.onclick = function () {
                message.style.display = "none";
            }
        } else {
            var nottype_id = $("#nottype_id").val();
            var id = "<?php echo $cuid ?>";
            // alert(nottype_id);
            $.ajax({
                type: "POST",
                url: '{{route('Info.add')}}',
                data: {_token: '{{csrf_token()}}', content: content, id: id, nottype_id: nottype_id},
                success: function (data) {
                    //   alert(data);
                    $('#info').append(data);

                    var commantadd = document.getElementById("commantadd");
                    commantadd.style.display = 'none';
                    $("#addcontent").val('');
                }, error: function (jqXHR, error, errorThrown) {
                    if (jqXHR.status && jqXHR.status == 400) {
                        alert(jqXHR.responseText);
                    } else {
                        alert(error.Message)
                    }
                }
            });
        }

    }
</script>
</div>
<!--/span-->
<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
    <div class="sidebar-nav-fixed">
        <div class="myBox1 well">
            <ul class="nav ">
                <!-- /.col-lg-6 -->
                <table class="table">
                    <tbody>
                    <li class="nav-header lolo"><strong>{{__('lang.following_by')}} {{is_null($Customers->follow_by)?__('lang.null'): \App\User::find($Customers->follow_by)->name}}</strong></li><br/>
                    <li class="nav-header lolo"><strong>{{__('lang.Customer_info')}}</strong></li>
                    <tr>
                        <td>{{__('lang.name')}}:</td>
                        <td>{{$Customers->name}}</td>
                    </tr>
                    <tr>
                        @if(auth()->user()->pattern==1 )
                            <td>{{__('lang.Taxid') }}</td>
                        @else
                            <td>{{__('lang.tax')}}</td>
                        @endif
                        <td>{{$Customers->taxid}}</td>
                    </tr>

                    <tr>
                        <td>{{__('lang.phone')}}:</td>
                        <td>{{$Customers->phone}}</td>
                    </tr>
                    <tr>
                        <td>{{__('lang.email')}}:</td>
                        <td>{{$Customers->email}}</td>
                    </tr>
                    </tbody>
                </table>

                <div>
                    <button class="btn btn-success" onclick="infoshow({{$Customers->id}})">{{__('lang.info')}}</button>
                </div>

                <table class="table">
                    <tbody>
                    <li class="nav-header lolo"><strong>{{__('lang.Invoices')}}</strong></li>
                    <tr>
                        <td>{{__('lang.total')}}:</td>
                        <td>{{$total}}</td>
                    </tr>
                    <tr>
                        <td>{{__('lang.pamnt')}}:</td>
                        <td>{{$pamnt}}</td>
                    </tr>
                    <tr>
                        <td>{{__('lang.Remaining_amount')}}:</td>
                        <td>{{$total-$pamnt}}</td>
                    </tr>
                    <tr>
                        <td>{{__('lang.balance')}}:</td>
                        <td>{{$Customers->balance}}</td>
                    </tr>
                    </tbody>
                </table>

                <div>
                    <button class="btn btn-success"
                            onclick="invoicshowing({{$Customers->id}})">{{__('lang.info')}}</button>
                </div>

                <table class="table">
                    <tbody>
                    <li class="nav-header lolo"><strong>{{__('lang.task')}}</strong></li>
                    <tr>
                        <td>{{ __('lang.tasktotal')}}:</td>
                        <td>{{$tasktotal}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.taskcompleted')}}:</td>
                        <td>{{$taskcompleted}}</td>
                    </tr>

                    <tr>
                        <td>{{ __('lang.tasknoncompleted')}}:</td>
                        <td>{{$tasknoncompleted}}</td>
                    </tr>
                    </tbody>
                </table>

                <div>
                    <button class="btn btn-success"
                            onclick="taskshowing({{$Customers->id}})">{{__('lang.info')}}</button>
                </div>
            </ul>
        </div>

        <div class="col-lg-12">
            <div id="my1" class="modal">
                <div class="modal-content">
                    <span class="clos1e">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div id="cu_info">


                            </div>

                        </div>

                    </div>

                    <script>
                        // Get the modal
                        var m1odal = document.getElementById("my1");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var s1pan = document.getElementsByClassName("clos1e")[0];
                        // When the user clicks the button, open the modal
                        infoshow = function (id, event) {
                            $.ajax({
                                type: "get",
                                url: '{{route('Info.cu')}}',
                                data: {_token: '{{csrf_token()}}', id: id},
                                success: function (data) {
                                    $("#cu_info").html(data);
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
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
                            if (event.target == modal2) {
                                modal2.style.display = "none";
                            }
                            if (event.target == modal3) {
                                modal3.style.display = "none";
                            }
                            if (event.target == modal4) {
                                modal4.style.display = "none";
                            }
                            if (event.target == notetypemodel) {
                                notetypemodel.style.display = "none";
                            }
                        }
                    </script>
                </div>

            </div>
        </div>

        <div class="col-lg-12">
            <div id="my2" class="modal">
                <div class="modal-content">
                    <span class="close2">&times;</span>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div id="invoiceinfo">

                            </div>

                        </div>

                    </div>

                    <script>
                        // Get the modal
                        var modal2 = document.getElementById("my2");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var span2 = document.getElementsByClassName("close2")[0];
                        // When the user clicks the button, open the modal

                        invoicshowing = function (id, event) {
                            $.ajax({
                                type: "get",
                                url: '{{route('Info.invoice')}}',
                                data: {_token: '{{csrf_token()}}', id: id},
                                success: function (data) {
                                    $("#invoiceinfo").html(data);
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
                            modal2.style.display = "block";
                            if (event.stopPropagation) event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        span2.onclick = function () {
                            modal2.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it

                    </script>
                </div>

            </div>
        </div>
        <!--/.taskshowing -->
        <div class="col-lg-12">
            <div id="my3" class="modal">
                <div class="modal-content">
                    <span class="close3">&times;</span>
                    <div class="panel-body">
                        <div id="taskinfo">

                        </div>
                    </div>
                    <script>
                        // Get the modal
                        var modal3 = document.getElementById("my3");
                        // Get the button that opens the modal
                        // var btn =   document.getElementsByClassName("myBtn");
                        // Get the <span> element that closes the modal
                        var span3 = document.getElementsByClassName("close3")[0];
                        // When the user clicks the button, open the modal

                        taskshowing = function (id, event) {
                            $.ajax({
                                type: "get",
                                url: '{{route('Info.task')}}',
                                data: {_token: '{{csrf_token()}}', id: id},
                                success: function (data) {
                                    $("#taskinfo").html(data);
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert("Something went wrong");
                                    }
                                }
                            });
                            modal3.style.display = "block";
                            if (event.stopPropagation) event.stopPropagation();
                        }
                        // Whn the user clicks on <span> (x), close the modal
                        span3.onclick = function () {
                            modal3.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it

                    </script>
                </div>

            </div>
        </div>
        <!-- Update -->
        <div class="col-lg-12">
            <div id="my4" class="modal">
                <div class="modal-content">
                    <span class="close4">&times;</span>
                    <div class="panel-body">

                        <!-- /.col-lg-6 -->
                        <div class="lolo col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <input class="hidden" id="notid">
                                            <div class="memo form-group">
                                                <label>{{__('lang.content') }}</label>
                                                <input id="content" type="text" name="content"
                                                       class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                       class="form-control" placeholder="{{__('lang.content') }}"
                                                       required>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <div class="panel-footer">
                            <input type="submit" onclick="save()" class="btn btn-primary" value="Save">
                        </div>
                        <!-- /.col-lg-6 -->


                    </div>
                    <script>
                        var modal4 = document.getElementById("my4");
                        var span4 = document.getElementsByClassName("close4")[0];
                        // When the user clicks the button, open the modal


                        save = function () {
                            id = $("#notid").val();
                            content = $("#content").val();
                            // alert(id+".........."+content);
                            $.ajax({
                                type: "get",
                                url: '{{route('Info.save')}}',
                                data: {_token: '{{csrf_token()}}', id: id, content: content},
                                success: function (data) {
                                    // alert(data);
                                    $("#UP_" + id).html(content);
                                    modal4.style.display = "none";
                                    if (event.stopPropagation) event.stopPropagation();
                                }, error: function (jqXHR, error, errorThrown) {
                                    if (jqXHR.status && jqXHR.status == 400) {
                                        alert(jqXHR.responseText);
                                    } else {
                                        alert(error.Message)
                                    }
                                }
                            });

                        }
                        // Whn the user clicks on <span> (x), close the modal
                        span4.onclick = function () {
                            modal4.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it

                    </script>
                </div>

            </div>
        </div>
        <!-- -->

    </div>
    <!--/sidebar-nav-fixed -->
</div>


<div class="col-lg-6">
    <div id="notetypemodel" class="modal col-lg-6">
        <div class="modal-content">
            <span class="notetypeclose">&times;</span>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="form-group">
                        {{csrf_field()}}
                        <label>{{__('lang.content') }}</label>
                        <input type="text" name="typename" id="typename"
                               placeholder="{{__('lang.typename') }}"
                               class="form-control{{ $errors->has('typename') ? ' is-invalid' : '' }}"
                               value="{{ old('typename') }}" required>
                    </div>
                    <div id="msg"></div>
                    <a type="submit" onclick="add_nottype()" class="btn btn-primary Mytextarea"
                       style="border-radius: 15px" id="sendMessageButton">ADD NEW TYPE</a>
                </div>

            </div>
            <script>
                var notetypemodel = document.getElementById("notetypemodel");
                var notetypespan = document.getElementsByClassName("notetypeclose")[0];
                notypeopen1dialog = function (event) {
                    notetypemodel.style.display = "block";
                    if (event.stopPropagation) event.stopPropagation();
                }
                notetypespan.onclick = function () {
                    notetypemodel.style.display = "none";
                }

                function add_nottype() {
                    var typename = $("#typename").val();
                    if (typename === '') {
                        $('#msg').html("<p id='message1' class='alert alert-warning'><span style='float: right' class='close6'>&times;</span> لم يتم استكمال المعلومات الضرورية </p>");
                        var message1 = document.getElementById("message1");
                        var span6 = document.getElementsByClassName("close6")[0];
                        span6.onclick = function () {
                            message1.style.display = "none";
                        }
                    } else {

                        $.ajax({
                            type: "POST",
                            url: '{{route('Info.addnottype')}}',
                            data: {_token: '{{csrf_token()}}', typename:typename},
                            success: function (data) {
                                //   alert(data);
                                $('#nottype_id').append(data);

                                notetypemodel.style.display = "none";


                            }, error: function (jqXHR, error, errorThrown) {
                                if (jqXHR.status && jqXHR.status == 400) {
                                    alert(jqXHR.responseText);
                                } else {
                                    alert(error.Message)
                                }
                            }
                        });
                    }

                }
            </script>
        </div>
    </div>
</div>

