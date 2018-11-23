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
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label>{{ trans('user.password') }}: </label>
                    <input type="password" class="form-control" name="password">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label>{{ trans('user.passwordc') }}: </label>
                    <input type="password" class="form-control" name="pasword_confirm">
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> {{ trans('user.create') }}</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
