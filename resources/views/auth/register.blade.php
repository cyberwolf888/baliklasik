@extends('layouts.frontend')

@push('plugin_css')
@endpush

@section('content')
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                        </div>
                        <h1>Register</h1>
                        <p>Please regsiter to our website so you can reserve plan for your perfect wedding.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="well-box">
                        <p>Please fill out the form below with correct information.</p>
                        <form method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label" for="first">Your Name <span class="required">*</span></label>
                                <input id="name" name="name" type="text" placeholder="Your Name" class="form-control input-md" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
                                <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class=" control-label" for="password">Password <span class="required">*</span></label>
                                <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class=" control-label" for="password-confirm">Confirm Password <span class="required">*</span></label>
                                <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control input-md" required>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush