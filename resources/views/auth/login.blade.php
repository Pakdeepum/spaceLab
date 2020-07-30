@extends('layouts.app-login')

<!-- CSS INCLUDE -->        
<link rel="stylesheet" type="text/css" id="theme" href='{{asset("dependencies/css/theme-default.css")}}'/>
<link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/main.css")}}'/>
<!-- EOF CSS INCLUDE -->

@section('content')

<div class="loginbg">
<div class="container">
    <div class="row">
    <!-- <img src="{{URL::asset('/dependencies/img/login/login_bg.png')}}"> -->
        <div class="col-lg-offset-3 col-lg-6" style="margin-top:180px;" >
            <div class="panel panel-default panelbg" style="border-top: 0;border-radius: 3px;">
                <div class="panel-heading red" ">
                    <h3 class="loginhd">BioSystems Login</h3>
                </div>
                <div class="panel-body">
                    @if(session('msg'))
                        <div class="alert alert-danger text-center">
                            {{session('msg')}} 
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div>
                            <div class="form-group form-group-lg{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-lg-4 control-label"></label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input id="text" placeholder="username" type="text" class="login-input form-control" name="username" value="{{ old('username') }}" required autofocus> 
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-group-lg{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-lg-10 col-lg-offset-1">
                                <input id="password" placeholder="Password" type="password" class="form-control login-input" name="password" required>
                                
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-5 col-lg-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                         keep me signed in
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="loginbtn btn-block btn-lg">
                                    Sign In
                                </button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
