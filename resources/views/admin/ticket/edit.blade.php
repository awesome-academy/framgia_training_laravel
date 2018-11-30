@extends('admin.master')
@section('content')
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach()
    <h1>{{ trans('messages.edit') }}</h1>
    <form method="POST" action=" {{route('tickets.update' , $ticket->id)}}">
        <div class="form-group">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <label for="exampleInputUsername1">{{trans('messages.title')}}</label>
            <input type="title" class="form-control" id="exampleInputUsername1" name="title" placeholder="Title" value = "{{ $ticket->title }}">
        </div>
        <div class="form-group">
            <label for="exampleInputUsername1">{{trans('messages.content')}}</label>
            <input type="content" class="form-control" id="exampleInputUsername1" name="content" placeholder="Content" value = "{{ $ticket->content }}">
        </div>
        <div class="form-group">
            <label for="exampleInputUsername1">{{trans('messages.status')}}</label>
            <select name="status" class="form-control">
                <option value="1" selected="true">{{trans('messages.approved')}}</option>
                <option value="2">{{trans('messages.pending')}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
    </form>
@endsection	
