@extends('admin.master')

@section('title','Show')

@section('header')

@endsection


@section('content')
 <h1 class="page-header">Users : {{ $user->name }} </h1>
 <div class="panel panel-default">
    <div class="panel-heading">
        Show Users
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        
        <div class="col-md-6">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#Name#</th>
                        <th>#Value#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Create: </td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
    </div>
    <!-- /.panel-body -->
</div>
@endsection

@section('footer')

@endsection
