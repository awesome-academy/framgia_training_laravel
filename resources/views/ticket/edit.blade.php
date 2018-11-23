@extends('admin.master')

@section('title','Edit Ticket')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">Edit Ticket</h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        Edit Ticket
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form method="POST" action="{{ route('admin.tickets.update', $ticket->id) }}">
                
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" class="form-control" name="title" value="{{ $ticket->title }}" placeholder="Cai gi do">
                    @if ($errors->has('title'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Content: </label>
                    <textarea name="content" class="form-control">{{ $ticket->content }}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status: </label>
                    <div class="checkbox">
                        <label><input name="status" type="checkbox" value="1" {{ ($ticket->status == 1)?'checked':'' }}>Show</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Ticket</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
