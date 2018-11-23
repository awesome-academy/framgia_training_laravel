@extends('admin.master')
 @section('title','ticket')
 @section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('content.ticket.detail_ticket') }}More ticket info</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="ticket-table">
                    <thead>
                        <tr>
                            <th>{{ trans('content.ticket.ticket_title') }}</th>
                            <th>{{ trans('content.ticket.ticket_content') }}</th>
                            <th>{{ trans('content.ticket.ticket_status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        	<tr class="odd gradeX">
	                            <td>{{ $ticket->title }}</td>
	                            <td>{{ $ticket->content }}</td>
	                            <td>{{ $ticket->status }}</td>
	                        </tr>
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
@endsection
