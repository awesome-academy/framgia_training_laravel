@extends('admin.master')

@section('title','User')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">More ticket info</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Status</th>
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

<div class="row">
    <div class="col-md-8">
      <div class="page-header">
        <h1> Comments </h1>
      </div> 
       <div class="comments-list">
           <div class="media">
                <a class="media-left" href="#"></a>
                @foreach($comments as $comment)
                <div class="col-sm-12 media-body">
                      <h4 class="media-heading user_name">{{ $comment->user->name }}</h4>
                      <span>{{ $comment->content }}     
                  <small>
                    <form action ="{{ route('comments.destroy', $comment->id) }}" method = 'POST'>
                      <button type="submit">Delete</button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>    
                  </small>

                </div>
                @endforeach
              </div>
       </div>
        <div class="form-group">
            <form action = "{{route('comments.store', $comment->id) }}" method = 'POST'>
                <input type="content" name="content" class="form-control" id="content"></input>
                <input type="hidden" name="post_id" class="form-control" value="{{ $ticket->id }}" id="content"></input>
                <button type="submit">Post</button>
                {{ csrf_field() }}
                {{ method_field('POST') }}
            </form>
        </div>
        
    </div>
</div>


@endsection

@section('footer')

@endsection
