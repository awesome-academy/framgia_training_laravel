@extends('admin.master')

@section('content')
    <h1>
        {{ trans('content.user.list_user') }}
    </h1>
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>{{ trans('content.user.user_name') }}</th>
                <th>{{ trans('content.user.user_email') }}</th>
                <th>{{ trans('content.user.user_action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUser as $user)
                <tr class="gradeA even" role="row">
                    <td class="sorting_1">
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <!-- duong dan dung asset -->
                        <!-- <a href="{{ asset('user/edit/'. $user->id)}}"></a> -->
                        <a href="{{ action('UserController@create',['id'=> $user->id]) }}">     
                        </a>
                        <form method="POST" action = {{ route('users.destroy',[ $user->id]) }}>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <a href="{{ action('UserController@edit',['id'=> $user->id]) }}">       
                                <button type="button" class="btn btn-primary">{{ trans('content.user.user_edit') }}</button>
                                <button type="submit" class="btn btn-danger">{{ trans('content.user.user_delete') }}</button>
                                <!-- <button onclick="return confirm_delete()"></button> -->
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
