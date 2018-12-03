@extends('admin.master')

@section('title','Edit User')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">{{ trans('user.edit') }}</h1>

 <div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('user.edit') }}
    </div>
    
    <div class="panel-body">
        <div class="col-md-4">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label>{{ trans('user.name') }}: </label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
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
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('user.save') }}</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
