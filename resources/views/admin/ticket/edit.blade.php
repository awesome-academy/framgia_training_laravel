@extends('admin.master')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('TicketController@update', $ticket->id)}}" >
        {{csrf_field()}}
        {{ method_field ('PATCH') }}
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">{{ trans('content.ticket.ticket_title') }}</label>
            <input type="text" class="form-control" name="title" value={{$ticket->title}} />
        </div>
        <div class="form-group">
            <label for="email">{{ trans('content.ticket.ticket_content') }}</label>
            <textarea textarea type="text" name="content" class="form-control" id="content" >{{ $ticket->content }}</textarea>
          </div>
           <div class="form-group">
            <label for="exampleUser1">{{ trans('content.ticket.ticket_status') }}</label>
            <select name ="status" class = "form-control">
              <option value="1" selected = "true">{{ trans('content.ticket.ticket_answered') }}</option>
              <option value="2">{{ trans('content.ticket.ticket_pending') }}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ trans('content.ticket.ticket_update') }}</button>
    </form>
    </div>
</div>
@endsection
