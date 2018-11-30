@extends('admin.master')
@section('content')
  
  <h1>{{ trans('content.user.edit_user') }}</h1> 

<form method="POST" action="{{ route('users.update', $user->id) }}">
  <div class="form-group">
    {{ csrf_field()  }}
    {{ method_field('PUT') }}
    <label for="exampleInputEmail1">{{ trans('content.user.email_address') }}</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" placeholder="username" value = "{{$user->email}}"> 
    <small id="emailHelp" class="form-text text-muted">We'll share your email with everyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputusername1">{{ trans('content.user.user_name') }}</label>
    <input type="text" class="form-control" id="exampleInputusername1" name="username" placeholder="username" value = "{{$user->username}}">
  </div>
  <div class="form-group">
    <label for="exampleInputusername1">{{ trans('content.user.password') }}</label>
    <input type="password" class="form-control" id="exampleInputusername1" name="edit password" placeholder="edit password" >
  </div><div class="form-group">
    <label for="exampleInputusername1">{{ trans('content.user.re_password') }}</label>
    <input type="password" class="form-control" id="exampleInputusername1" name="reconfirm password" placeholder="reconfirm password " >
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{ trans('content.user.user_checkout') }}</label>
  </div>
  <button type="submit" class="btn btn-primary">{{ trans('content.user.user_submid') }}</button>
</form>
@endsection
