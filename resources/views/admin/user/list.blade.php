@extends('admin.master')

@section('title','Dashboard')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">List Users <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i> Create User</a></h1> 
 <div class="panel panel-default">
    <div class="panel-heading">
        List Users
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created_at</th>
                    <th>Action</th>
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
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-default btn-sm"> <i class="fa fa-info"> </i> Info</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"> </i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return userDelete({{$user->id}})"> <i class="fa fa-remove"> </i> Delete</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" id="delete-form{{$user->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
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
<script>
    function userDelete(id){
        var result = confirm("Are you sure you want to delete this item?");
        if (result) {
            document.getElementById('delete-form'+id).submit();
        }
    }
</script>
@endsection
