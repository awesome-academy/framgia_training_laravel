@extends('admin.master')

@section('content')

		<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('message.create') }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('message.list') }}
            </div>
            @foreach ($errors->all() as $error)
              <p class = "alert alert-danger">{{$error}}</p>
            @endforeach
            <!-- /.panel-heading -->
            <div class="panel-body">
                 <form action="{{ route('users.store') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">{{ trans('message.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                      </div>
                      <div class="form-group">
                        <label for="email">{{ trans('message.email') }}</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                      </div>
                      <div class="form-group">
                        <label for="pwd">{{ trans('message.pass') }}</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                      </div>
                      <div class="form-group">
                        <label for="pwd">{{ trans('message.confirm') }}</label>
                        <input type="password" name="confirm_password" class="form-control" id="cf_pwd">
                      </div>
                      <button type="submit" class="btn btn-default"><i class="fa fa-edit"></i>Create</button>
                </form> 
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.container-fluid -->
@endsection
