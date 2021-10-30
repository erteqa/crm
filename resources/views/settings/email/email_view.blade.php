@extends("layouts.Admin_app")

@section('content')
    <article class="content">
        <div class="card card-block">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <form method="post" id="product_action" class="form-horizontal">
                <div class="grid_3 grid_4">
                    {{csrf_field()}}
                    <h5>Edit Email Configuration</h5>
                    <hr>


                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="host">Host</label>

                        <div class="col-sm-6">
                            <input type="text" placeholder="host"
                                   class="form-control margin-bottom  required" name="host"
                                   value="{{$email['host'] }}">
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="port">Port</label>

                        <div class="col-sm-6">
                            <input type="text" placeholder="port"
                                   class="form-control margin-bottom  required" name="port"
                                   value="{{$email['port'] }}">
                            <small>Port 587 recommended with TLS</small>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="auth">Auth</label>

                        <div class="col-sm-6">
                            <select name="auth" class="form-control">
                                @if ($email['auth']=='true')
                                  <option value="true">--True--</option>
                                @else
                                  <option value="false">--False-- </option>
                                @endif
                                <option value="true">True</option>
                                <option value="false">False </option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="auth_type">Auth Type</label>

                        <div class="col-sm-6">
                            <select name="auth_type" class="form-control">
                                <option value="{{$email['auth_type']}}">--{{$email['auth_type']}}--</option>
                                <option value="none">None</option>
                                <option value="tls">TLS</option>
                                <option value="ssl">SSL</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="username">Username</label>

                        <div class="col-sm-6">
                            <input type="text" placeholder="username"
                                   class="form-control margin-bottom  required" name="username"
                                   value="{{$email['username'] }}">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="password">Password</label>

                        <div class="col-sm-6">
                            <input type="password" placeholder="password"
                                   class="form-control mb-3  required" name="password"
                                   value="{{$email['password'] }}">
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="sender">Sender Email</label>

                        <div class="col-sm-6">
                            <input type="text" placeholder="email"
                                   class="form-control mb-3  required" name="sender"
                                   value="{{$email['sender'] }}">
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label"></label>

                        <div class="col-sm-6">
                            <input type="submit" id="email_update" class="btn btn-success margin-bottom"
                                   value="Update" data-loading-text="Updating...">

                        </div><div class="col-sm-12"><span id="email_update_m"></span></div>
                    </div>

                </div>
            </form>

        </div>
    </article>


@endsection

