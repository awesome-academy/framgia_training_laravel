@extends('admin.master')

@section('title','Add New User')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">Add New User</h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        Add New User
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <form method="POST" action="{{ route('admin.users.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Doanh Vu">
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="doanhdev@gmail.com">
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
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> New User</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
