@extends('layouts.app')

@section('page-title', 'Roles')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $edit ? $role->name : 'Create New Role' }}
            <small>{{ $edit ? "edit role details" : "role details" }}</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('role.index') }}">Roles</a></li>
                    <li class="active">{{ $edit ? 'Edit' : 'Create' }}</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
@else
    {!! Form::open(['route' => 'role.store', 'id' => 'role-form']) !!}
@endif

<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Role Details</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="Role Name" value="{{ $edit ? $role->name : old('name') }}">
                </div>
                <div class="form-group">
                    <label for="display_name">Display Name</label>
                    <input type="text" class="form-control" id="display_name"
                           name="display_name" placeholder="Display Name" value="{{ $edit ? $role->display_name : old('display_name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $edit ? $role->description : old('description') }}</textarea>
                </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-save"></i>
            {{ $edit ? 'Update Role' : 'Create Role' }}
        </button>
    </div>
</div>

@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\UpdateRoleRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop