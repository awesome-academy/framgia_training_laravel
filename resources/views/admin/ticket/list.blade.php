@extends('admin.master')

@section('content')
	<h1 class="page-header">{{trans('messages.list')}}</h1>
    <a href="{{ action('TicketController@create') }}" >
           <button type="button" class="btn btn-success">{{trans('messages.create')}}</button>
    </a>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <thead>
        <tr>
            <th>{{trans('messages.title')}}</th>
            <th>{{trans('messages.content')}}</th>
            <th>{{trans('messages.status')}}</th>
            <th>{{trans('messages.action')}}</th>
        </tr>
    </thead>
    </thead>
    <tbody>
    	@foreach($listTicket as $ticket)
		<tr class="gradeA even" role="row">
            <td class="sorting_1">{{ $ticket->title }}</td>
            <td>{{ $ticket->content }}</td>
            @if($ticket->status == 1)
                <td>Approved</td>
            @else
                <td>Pending</td>
            @endif
            <td>
            	<a href="{{ action('TicketController@edit' , ['id' => $ticket->id]) }}" >
            	<button type="button" class="btn btn-success">{{trans('messages.edit')}}</button>
            	</a>
                <form method="POST" action = {{ route('tickets.destroy', [$ticket->id]) }}>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                	<a href="">
                	   <button onclick="return confirm_delete()" type="submit" class="btn btn-danger"">{{trans('messages.delete')}}
                       </button>
                	</a>
                </form>
        	</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <script type="text/javascript">
        function confirm_delete() {
            return confirm('{{ trans('messages.confirm') }}');
        }
    </script>
    {{ $listTicket->links() }}
@endsection
