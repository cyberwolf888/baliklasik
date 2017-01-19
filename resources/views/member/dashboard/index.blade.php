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
                        <li class="active"><a href="{{ route('member.dashboard') }}"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                        <li><a href="{{ route('member.transaction.manage') }}"><i class="fa fa-calculator db-icon"></i>My Wedding</a></li>
                        <li><a href="{{ route('member.profile.manage') }}"><i class="fa fa-user db-icon"></i>My Profile</a></li>
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
                                    <h1>My Dashboard <small>Welcome Couple.</small></h1>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-4">
                                <div class="action-block"> <a href="#" class="btn btn-default">BUtton</a> </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- wedding days block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Wedding days to go</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">540</h1>
                        </div>
                        <div>SAT, 31 MARCH 2018</div>
                    </div>
                </div>
                <!-- wedding days block -->
                <div class="col-md-4">
                    <!-- wedding budget block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Your Budget</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">$20,000</h1>
                        </div>
                        <div>Spent $1200 out of $20,000 so far.</div>
                    </div>
                </div>
                <!-- wedding budget block -->
                <div class="col-md-4">
                    <!-- wedding budget block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Checklist - todos</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">78</h1>
                        </div>
                        <div>Completed 3 of 78 checklist items</div>
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