@extends('admin.master')

@section('title','Dashboard')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">{{ trans('user.list') }}</h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i> {{ trans('user.create') }}</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ trans('user.name') }}</th>
                    <th>Email</th>
                    <th>{{ trans('user.created_at') }}</th>
                    <th>{{ trans('user.action') }}</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)
                	<tr class="odd gradeX">
	                    <td>{{ $user->id }}</td>
	                    <td>{{ $user->name }}</td>
	                    <td>{{ $user->email }}</td>
	                    <td>{{ $user->created_at }}</td>
	                    <td class="center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"> <i class="fa fa-edit"> </i> {{ trans('action.edit') }}</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ trans('action.question') }}');"><i class="fa fa-remove"> </i> {{ trans('action.delete') }}</button>
                            </form>
                        </td>
	                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- /.panel-body -->
</div>
@endsection


@section('footer')

@endsection
