@extends('app')

@section('content')
    <section class="main-content-wrapper">
        <div class="pageheader">
            <h1>Your Profile</h1>
            <p class="description">Manage your profile</p>
            <div class="breadcrumb-wrapper hidden-xs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="active">Your Profile</li>
                </ol>
            </div>
        </div>
        <section id="main-content">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Account Details</h3>
                        </div>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::open(array('route' => 'users.profile', 'class' => 'form-horizontal form-border')) !!}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        New Password
                                        <p class="help-block">Leave blank to keep your current password</p></label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password Confirmation</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
