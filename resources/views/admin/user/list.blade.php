@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('message.list') }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                  <a class="btn btn-default" href ="{{ route('users.create') }}"><i class="fa fa-edit"></i>{{ trans('message.create') }}</a>
            </div>    
            <!-- /.panel-heading -->
            <div class="panel-body">
                @if (session('thongbao'))

                    <div class="alert alert-success">
                    {{ session('thongbao') }}
                    </div>

                @endif
                <table width="100%" class="table table-striped table-bordered table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th>{{ trans('message.i') }}</th>
                            <th>{{ trans('message.name') }}</th>
                            <th>{{ trans('message.email') }}</th>
                            <th>{{ trans('message.ac') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listUser as $user)
                            <tr class="odd gradeX">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="center">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">info</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    <!-- <a href="" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a> -->
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" >
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.container-fluid -->

@endsection
