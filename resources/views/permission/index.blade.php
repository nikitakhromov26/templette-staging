@extends('layouts.app')

@section('page-title', 'Permissions')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Permissions
            <small>available system permissions</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="active">Permissions</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('permission.create') }}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i>
            Add Permission
        </a>
    </div>
</div>

{!! Form::open(['route' => 'permission.save']) !!}

<div class="table-responsive" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>Name</th>
            @foreach ($roles as $role)
                <th class="text-center">{{ $role->display_name }}</th>
            @endforeach
            <th class="text-center">Action</th>
            </thead>
        <tbody>
        @if (count($permissions))
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->display_name ?: $permission->name }}</td>

                    @foreach ($roles as $role)
                        <td class="text-center">
                            <div class="checkbox">
                                {!! Form::checkbox("roles[{$role->id}][]", $permission->id, $role->hasPermission($permission->name)) !!}
                                <label class="no-content"></label>
                            </div>
                        </td>
                    @endforeach

                    <td class="text-center">
                        <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-circle"
                           title="Edit Permission" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        @if ($permission->removable)
                            <a href="{{ route('permission.destroy', $permission->id) }}" class="btn btn-danger btn-circle"
                               title="Delete Permission"
                               data-toggle="tooltip"
                               data-placement="top"
                               data-method="DELETE"
                               data-confirm-title="Please confirm"
                               data-confirm-text="Are you sure that you want to delete this permission?"
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

@if (count($permissions))
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                Save Permissions
            </button>
        </div>
    </div>
@endif

{!! Form::close() !!}

@stop
