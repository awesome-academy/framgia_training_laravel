@extends('admin.master')

@section('title','List Ticket')

@section('header')
@endsection

@section('content')
<h1 class="page-header">{{ trans('ticket.list') }}</h1> 
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i> {{ trans('ticket.create') }}</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ trans('ticket.title') }}</th>
                    <th>{{ trans('ticket.status') }}</th>
                    <th>{{ trans('ticket.action') }}</th>
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
                        <td class="center">
                            <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-default btn-xs"> <i class="fa fa-info"> </i> {{ trans('action.show') }}</a>

                            @if (Auth::user()->id == $ticket->user_id)
                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-warning btn-xs"> <i class="fa fa-edit"> </i> {{ trans('action.edit') }}</a>
                                <a href="#" class="btn btn-danger btn-xs" onclick="return ticketDelete({{$ticket->id}})"> <i class="fa fa-remove"> </i> {{ trans('action.delete') }}</a>
                                <form method="POST" action="{{ route('admin.tickets.destroy', $ticket->id) }}" id="delete-form{{$ticket->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach           
            </tbody>
        </table>
        {{ $tickets->links() }}
    </div>
    <!-- /.panel-body -->
</div>
@endsection

@section('footer')
<script>
    function ticketDelete(id){
        var result = confirm("{{ trans('action.question') }}");
        if (result) {
            document.getElementById('delete-form'+id).submit();
        }
    }
</script>
@endsection
