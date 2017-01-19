@extends('layouts.frontend')

@push('plugin_css')
@endpush

@section('content')
    <div class="tp-dashboard-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 profile-header">
                    <div class="profile-pic col-md-2"><img src="{{ url('assets') }}/images/couple-profile.jpg" alt="" class="img-circle"></div>
                    <div class="profile-info col-md-9">
                        <h1 class="profile-title">{{ Auth::user()->name }}<small>Welcome Back Couple</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.page header -->
    <div class="tp-dashboard-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 dashboard-nav">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{ route('member.dashboard') }}"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                        <li><a href="{{ route('member.transaction.manage') }}"><i class="fa fa-calculator db-icon"></i>My Wedding</a></li>
                        <li class="active"><a href="{{ route('member.profile.manage') }}"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="page-title">
                                    <h1>Account Details <small>Change your personal profile and wedding details</small></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-7 dashboard-form calender">
                                {!! Form::open(['route' => 'member.profile.personal','class'=>'form-horizontal']) !!}
                                <div class="bg-white pinside40 mb30">
                                    <!-- Text input-->
                                    <h2 class="form-title">Pesonal Infomations</h2>
                                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="name">Your Name <span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="nama" name="nama" type="text" placeholder="Your Name" class="form-control input-md" required="" value="{{ $member->nama }}">
                                            @if ($errors->has('nama'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="no_hp">Phone Number <span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="no_hp" name="no_hp" type="text" placeholder="Phone Number" class="form-control input-md" required="" value="{{ $member->no_hp }}">
                                            @if ($errors->has('no_hp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="alamat">Address <span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="alamat" name="alamat" type="text" placeholder="Address" class="form-control input-md" required="" value="{{ $member->alamat }}">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 dashboard-form">
                            {!! Form::open(['route' => 'member.profile.password','class'=>'form-horizontal']) !!}
                                <div class="bg-white pinside30">
                                    <!-- Form Name -->
                                    <h2 class="form-title">Change Password</h2>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="email">Email <span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="email" name="email" type="email" placeholder="Email" class="form-control input-md" required="" value="{{ $user->email }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="password">New Password</label>
                                        <div class="col-md-8">
                                            <input id="password" name="password" type="password" placeholder="New Password" class="form-control input-md" required="">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="password-confirm">Confirm Password</label>
                                        <div class="col-md-8">
                                            <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" class="btn btn-primary btn-lg">Save Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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