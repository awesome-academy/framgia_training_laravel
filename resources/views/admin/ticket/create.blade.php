@extends('admin.master')
@section('Contact')
@section('content')

	<div class="container col-md-8 col-md-offset-2 ">
		<div class="well well bs-component">
			<form method="POST" action="{{ route('tickets.store') }}">
			{{ csrf_field()  }}
		    {{ method_field('POST') }}
					<legend>{{ trans('content.ticket.create_ticket') }}</legend>
				<div class="form-group">
					<label for="title" class="col-lg-2 control-label">{{ trans('content.ticket.ticket_title') }}</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id ="title" name="title" placeholder="title">
					</div>	
				</div>
				<div class="form-group">
					<label for="content" class="col-lg-2 control-label">{{ trans('content.ticket.ticket_content') }}</label>
					<div class="col-lg-10">
					<textarea class="form-control" rows="3" id="content" name="content"></textarea>
					<span class="help-block">{{ trans('content.ticket.ticket_feel') }}</span>
					</div>
				</div>
	              <div class="form-group">
		                <label for="exampleticket1">{{ trans('content.ticket.ticket_status') }}</label>
		                <select name ="status" class = "form-control">
		                  <option value="1" selected = "true">{{ trans('content.ticket.ticket_answered') }}</option>
		                  <option value="2">{{ trans('content.ticket.ticket_pending') }}</option>
		                </select>
	              </div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btm btn-primary">{{ trans('content.ticket.ticket_submit') }}</button>
						<button class="btm btn-default">{{ trans('content.ticket.ticket_cancel') }}</button>

					</div>
				</div>
			</form>
		</div>
	</div>

@endsection	
