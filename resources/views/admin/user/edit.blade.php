@extends('admin.master')

@section('title','Edit User')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">Edit User</h1>

 <div class="panel panel-default">
    <div class="panel-heading">
        Edit User
    </div>
    
    <div class="panel-body">
        <div class="col-md-4">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" class="form-control" value="{{ $user->email }}">
                    @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Password Confirm: </label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save User</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
