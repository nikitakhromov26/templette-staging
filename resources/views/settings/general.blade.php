@extends('layouts.app')

@section('page-title', 'General Settings')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            General Settings
            <small>manage general system settings</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="javascript:;">Settings</a></li>
                    <li class="active">General</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

{!! Form::open(['route' => 'settings.general.update', 'id' => 'general-settings-form']) !!}

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">General App Settings</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">App Name</label>
                    <input type="text" class="form-control" id="app_name"
                           name="app_name" value="{{ settings('app_name') }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i>
                    Update Settings
                </button>
            </div>
        </div>
    </div>
</div>

@stop