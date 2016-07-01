@extends('layouts.app')

@section('content')

<style type="text/css">
.btn-fb{
  background-color: #3b5998;
  color: #fff;
}
.btn-tw{
  background-color: #55acee;
  color: #fff;
}
.btn-go{
  background-color: #dd4b39;
  color: #fff;
}
.btn-li{
  background-color: #007bb5;
  color: #fff;
}
.btn-git{
  background-color: #000;
  color: #fff;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <a href="{{ url('login/facebook') }}" class="btn btn-fb">Login with Facebook</a>
                    <a href="{{ url('login/twitter') }}" class="btn btn-tw">Login with Twitter</a>
                    <a href="{{ url('login/google') }}" class="btn btn-go">Login with Google+</a>
                    <a href="{{ url('login/linkedin') }}" class="btn btn-li">Login with LinkedIn</a>
                    <a href="{{ url('login/github') }}" class="btn btn-git">Login with GitHub</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
