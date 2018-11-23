@extends('admin.master')

@section('title','List Ticket')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">List Ticket <a href="{{ route('admin.tickets.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i> Create Ticket</a></h1> 
 <div class="panel panel-default">
    <div class="panel-heading">
        List Ticket
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($tickets as $ticket)
                	<tr class="odd gradeX">
	                    <td>{{ $ticket->id }}</td>
	                    <td>{{ $ticket->title }}</td>
                        <td>
                            @if ($ticket->status == 1) 
                                <span class="text-success">Hiển thị</span>
                            @else
                                <span class="text-default">Ẩn</span>
                            @endif
                        </td>
	                    <td>{{ $ticket->user_id }}</td>
	                    <td class="center">
                            <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-default btn-sm"> <i class="fa fa-info"> </i> Show</a>
                            <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"> </i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return ticketDelete({{$ticket->id}})"> <i class="fa fa-remove"> </i> Delete</a>
                            <form method="POST" action="{{ route('admin.tickets.destroy', $ticket->id) }}" id="delete-form{{$ticket->id}}">
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
    function ticketDelete(id){
        var result = confirm("Are you sure you want to delete this item?");
        if (result) {
            document.getElementById('delete-form'+id).submit();
        }
    }
</script>
@endsection
