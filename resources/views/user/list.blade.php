@extends('layouts.app')

@section('page-title', 'Users')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Users
            <small>list of registered users</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="active">Users</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('user.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Add User
        </a>
    </div>
    <div class="col-md-5"></div>
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col-md-2">
            {!! Form::select('status', $statuses, Input::get('status'), ['id' => 'status', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" value="{{ Input::get('search') }}" placeholder="Search for users...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search-users-btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    @if (Input::has('search') && Input::get('search') != '')
                        <a href="{{ route('user.list') }}" class="btn btn-danger" type="button" >
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>Username</th>
            <th>Full Name</th>
            <th>E-Mail</th>
            <th>Registration Date</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </thead>
        <tbody>
            @if (count($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username ?: 'N/A' }}</td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <span class="label label-{{ $user->present()->labelClass }}">{{ $user->status }}</span>
                        </td>
                        <td class="text-center">
                            @if (config('session.driver') == 'database')
                                <a href="{{ route('user.sessions', $user->id) }}" class="btn btn-info btn-circle"
                                   title="User Sessions" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-list"></i>
                                </a>
                            @endif
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-success btn-circle"
                               title="View User" data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-circle edit" title="Edit User"
                                    data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-circle" title="Delete User"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-method="DELETE"
                                    data-confirm-title="Please confirm"
                                    data-confirm-text="Are you sure that you want to delete this user?"
                                    data-confirm-delete="Yes, delete him!">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><em>No records found.</em></td>
                </tr>
            @endif
        </tbody>
    </table>

    {!! $users->render() !!}
</div>

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
