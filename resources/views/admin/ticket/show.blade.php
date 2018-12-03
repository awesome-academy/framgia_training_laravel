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

            <h3>{{ trans('comment.comment') }}:</h3>

            @forelse ($comments as $comment)
                <p>{{ $comment->content }} 
                    @if (Auth::user()->id == $comment->user_id)
                        <a href="#" class="btn btn-danger btn-xs" onclick="return commentDelete({{$comment->id}})"> <i class="fa fa-remove"> </i> {{ trans('action.delete') }}</a>
                        <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" id="delete-form{{$comment->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    @else
                    
                    @endif
                </p>
            @empty
                <p>{{ trans('comment.nocomment') }}<p>
            @endforelse
             
            <form action="{{ route('admin.comments.store') }}" method="POST" role="form">

                {{ csrf_field() }}
                
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                <div class="form-group">
                   <label>{{ trans('comment.reply') }}: </label>
                   <textarea name="content" class="form-control" placeholder="Viet cai gi do vao day"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ trans('comment.save') }}</button>
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

    function commentDelete(id){
        var result = confirm("{{ trans('action.question') }}");
        if (result) {
            document.getElementById('delete-form'+id).submit();
        }
    }
</script>
@endsection
