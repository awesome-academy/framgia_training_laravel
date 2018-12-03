@extends('admin.master')

@section('title','Show')

@section('header')
@endsection

@section('content')
<h1 class="page-header"></h1>
<div class="panel panel-default">
    <div class="panel-heading">

    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        
        <div class="col-md-6">
            
            <h1>{{ $ticket->title }}</h1>
            <p>{{ $ticket->content }}</p>
            @if (Auth::user()->id == $ticket->user_id)
                <td class="center">
                    <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"> </i> {{ trans('action.edit') }}</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="return ticketDelete()"> <i class="fa fa-remove"> </i> {{ trans('action.delete') }}</a>
                    <form method="POST" action="{{ route('admin.tickets.destroy', $ticket->id) }}" id="delete-form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            @endif
             
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label>{{ trans('ticket.reply') }}: </label>
                    <textarea name="content" class="form-control" placeholder="Viet cai gi do vao day"></textarea>
                </div>
                 <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
            
        </div>
        
    </div>
    <!-- /.panel-body -->
</div>
@endsection

@section('footer')
<script>
    function ticketDelete(){
        var result = confirm("{{ trans('action.question') }}");
        if (result) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endsection
