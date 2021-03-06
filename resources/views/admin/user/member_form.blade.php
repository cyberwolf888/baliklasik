@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.user.member.manage') }}">User</a></li>
            <li class="active"><a href="{{ route('admin.user.member.manage') }}">Member</a></li>

        </ol>
        <div class="page-heading">
            <h1>Manage User<small>Member</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => isset($update) ? ['admin.user.member.update', $model->id] : 'admin.user.member.store']) !!}
                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>Oh Snap!</h4>
                                <p>There is some error in your field value, please check field listed bellow.</p> <br>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close"></i>&nbsp; {{ $error }}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Member</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <div class="form-group is-empty">
                                    <label for="nama" class="control-label">Member Name</label>
                                    {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'Member Name','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="username" class="control-label">Username</label>
                                    {!! Form::text('username', $user->username, ['id'=>'username','placeholder'=>'Username','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="email" class="control-label">Email</label>
                                    {!! Form::email('email', $user->email, ['id'=>'email','placeholder'=>'Email','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="password" class="control-label">Password</label>
                                    {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="password_confirmation" class="control-label">Confirm Password</label>
                                    {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'Confirm Password','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="no_hp" class="control-label">Member No. HP</label>
                                    {!! Form::number('no_hp', $model->no_hp, ['id'=>'no_hp','placeholder'=>'Member No. HP','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="alamat" class="control-label">Address</label>
                                    {!! Form::textarea('alamat', $model->alamat, ['id'=>'alamat','placeholder'=>'Address','class'=>'form-control','rows'=>3, 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">Status</label>
                                    {!! Form::select('status', ['1' => 'Active', '0' => 'Non Active'], $user->status, ['class'=>'form-control','required']) !!}
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                                {{ Form::submit('Save',['class'=>'btn btn-primary btn-raised']) }}
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<!-- Initialize scripts for this page-->
@endpush

@push('scripts')
@endpush