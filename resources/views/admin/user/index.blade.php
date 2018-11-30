@extends('admin.master')

@section('title','User')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User List</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body">
                  <a class="btn btn-default" href ="{{ route('users.create') }}"><i class="fa fa-edit"></i>Create a new user</a>
            </div>    

            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
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
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">More info</a>
	                            	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
	                            	<!-- <a href="" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a> -->
	                            	<form style="display:inline-block;" method="POST" action="{{ route('users.destroy', $user->id) }}" >
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

@section('footer')

<script>
	$(document).ready(function() {
	    $('#user-table').DataTable({
	        responsive: true
	    });
	});
</script>

@endsection
