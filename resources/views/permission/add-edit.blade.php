@extends('layouts.app')

@section('page-title', 'Permissions')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $edit ? $permission->name : 'Create New Permission' }}
            <small>{{ $edit ? "edit permission details" : "permission details" }}</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('permission.index') }}">Permissions</a></li>
                    <li class="active">{{ $edit ? 'Edit' : 'Create' }}</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['permission.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
@else
    {!! Form::open(['route' => 'permission.store', 'id' => 'permission-form']) !!}
@endif

<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Permission Details</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="Permission Name" value="{{ $edit ? $permission->name : old('name') }}">
                </div>
                <div class="form-group">
                    <label for="display_name">Display Name</label>
                    <input type="text" class="form-control" id="display_name"
                           name="display_name" placeholder="Display Name" value="{{ $edit ? $permission->display_name : old('display_name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $edit ? $permission->description : old('description') }}</textarea>
                </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            {{ $edit ? 'Update Permission' : 'Create Permission' }}
        </button>
    </div>
</div>

@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Permission\UpdatePermissionRequest', '#permission-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Permission\CreatePermissionRequest', '#permission-form') !!}
    @endif
@stop