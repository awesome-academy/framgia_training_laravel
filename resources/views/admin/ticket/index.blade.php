@extends('admin.master')
@section('content')
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('content.ticket.edit_ticket') }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('content.ticket.list_ticket') }}
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th>{{ trans('content.ticket.ticket_title') }}</th>
                            <th>{{ trans('content.ticket.ticket_content') }}</th>
                            <th>{{ trans('content.ticket.ticket_status') }}</th>
                            <th>{{ trans('content.ticket.ticket_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                           @foreach($tickets as $ticket)
                        	<tr class="gradeA even" role = "row">
 	                            <td><a href = "{{ route('tickets.show', $ticket->id) }}">{{ $ticket->title }}</a></td>
	                            <td>{{ $ticket->content }}</td>
	                            @if ($ticket->status == 1)
	                            <td>{{ trans('content.ticket.ticket_submit') }}</td>
	                            @else
	                            <td>{{ trans('content.ticket.ticket_pending') }}</td>
	                            @endif
	                           </td>
	                       
	                        <td class="center">
	                            	<a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i>{{ trans('content.ticket.ticket_edit') }}</a>
	                            	<!-- <a href="" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a> -->
	                            	<form style="display:inline-block;" method="POST" action="{{ route('tickets.destroy', $ticket->id) }}">
	                            		{{ csrf_field() }}
	                            		{{ method_field('DELETE') }}
 	                            		<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">{{ trans('content.ticket.ticket_delete') }}</button>
	                            		
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
 