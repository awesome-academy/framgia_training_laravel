@extends('admin.master')
@section('content')
<h1>{{ trans('content.user.create_user') }}</h1> 
<form method="POST" action="{{ route('users.store') }}">
    <div class="form-group">
    {{ csrf_field()  }}
    {{ method_field('POST') }}
        <label for="exampleInputEmail1">{{ trans('content.user.email_address') }}</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" placeholder="username" > 
        <p class="help text-danger">{{ $errors->first('email') }}</p>
    </div>
    <div class="form-group">
        <label for="exampleInputusername1">{{ trans('content.user.user_name') }}</label>
        <input type="text" class="form-control" id="username" name="name" placeholder="username" >
        <p class="help text-danger">{{ $errors->first('username') }}</p>
    </div>
    <div class="form-group">
        <label for="exampleInputusername1">{{ trans('content.user.password') }}</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password" >
        <p class="help text-danger">{{ $errors->first('password') }}</p>
    </div><div class="form-group">
        <label for="exampleInputusername1">{{ trans('content.user.re_password') }}</label>
        <input type="password" class="form-control" id="password-confirm" name="passwordConfirm" placeholder="password confirm" >
        <p class="help text-danger">{{ $errors->first('passwordConfirm') }}</p>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">{{ trans('content.user.user_checkout') }}</label>
    </div>
        <button type="submit" class="btn btn-primary">{{ trans('content.user.user_submid') }}</button>
</form>
@endsection
