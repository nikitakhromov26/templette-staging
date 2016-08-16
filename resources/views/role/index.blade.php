@extends('layouts.app')

@section('page-title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Roles
                <small>available system roles</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="active">Roles</li>
                    </ol>
                </div>

            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="row tab-search">
        <div class="col-md-2">
            <a href="{{ route('role.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                Add Role
            </a>
        </div>
    </div>


    <div class="table-responsive" id="users-table-wrapper">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Display Name</th>
                <th># of users with this role</th>
                <th class="text-center">Action</th>
                </thead>
            <tbody>
            @if (count($roles))
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->users_count }}</td>
                        <td class="text-center">
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-circle"
                               title="Edit Role" data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            @if ($role->removable)
                                <a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger btn-circle"
                                   title="Delete Role"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   data-method="DELETE"
                                   data-confirm-title="Please confirm"
                                   data-confirm-text="Are you sure that you want to delete this role?"
                                   data-confirm-delete="Yes, delete it!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"><em>No records found.</em></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

@stop
