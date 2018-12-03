@extends('admin.master')

@section('title','Add New User')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">{{ trans('user.create') }}</h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('user.create') }}
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <form method="POST" action="{{ route('admin.users.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ trans('user.name') }}: </label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ trans('user.password') }}: </label>
                    <input type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>{{ trans('user.passwordc') }}: </label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> {{ trans('user.create') }}</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
