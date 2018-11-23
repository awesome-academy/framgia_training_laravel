@extends('admin.master')

@section('title','Add New Ticket')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">Add New Ticket</h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        Add New Ticket
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <form method="POST" action="{{ route('admin.tickets.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Cai gi do">
                    @if ($errors->has('title'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Content: </label>
                    <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Ticket</button>
            </form>
        </div>
    </div>
 </div>
@endsection


@section('footer')

@endsection
