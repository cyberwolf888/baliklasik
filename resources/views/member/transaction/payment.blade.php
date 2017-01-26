@extends('layouts.frontend')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/jquery-ui.css">
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
                        <li class="active"><a href="{{ route('member.transaction.manage') }}"><i class="fa fa-calculator db-icon"></i>My Wedding</a></li>
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
                                    <h1>My Payment <small>Create your wedding to do and start planning.</small></h1>
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
                            {!! Form::open(['route' => ['member.transaction.store_payment',$id],'class'=>'form-horizontal','files' => true]) !!}
                            <div class="bg-white pinside40 mb30">
                                <!-- Text input-->
                                <h2 class="form-title">Payment Infomations</h2>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="image">Image <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" id="image" class="form-control input-md" required="">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('total_transfer') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="total_transfer">Total Transfer <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="total_transfer" name="total_transfer" type="text" placeholder="Total Transfer" class="form-control input-md" required="" value="{{ old('total_transfer') }}">
                                        @if ($errors->has('total_transfer'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('total_transfer') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('date_transfer') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="date_transfer">Transfer Date <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" name="date_transfer" class="form-control" id="date_transfer" placeholder="Transfer Date" value="{{ old('date_transfer') }}">
                                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        @if ($errors->has('date_transfer'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('date_transfer') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="bank">Bank Transfer <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="bank" required>
                                            <option value="1">BCA</option>
                                            <option value="2">Mandiri</option>
                                        </select>
                                        @if ($errors->has('bank'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('bank') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary">Save Payment</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="col-md-5 dashboard-form">
                            <div class="bg-white pinside30">
                                <!-- Form Name -->
                                <h2 class="form-title">Bank Information</h2>
                                <p>Please do fund transfer before 24 hour from your last transaction to following bank:</p>
                                <span><b>Bank Central Asia (BCA)</b></span><br>
                                <span>772-514-2048</span><br>
                                <span>An. Bali Klasik</span><br><br>

                                <span><b>Bank Mandiri</b></span><br>
                                <span>900-001-367-4529</span><br>
                                <span>An. Bali Klasik</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
@endpush

@push('scripts')
<script>
    $( function() {
        $( "#date_transfer" ).datepicker({

        });
        $( '#ui-datepicker-div' ).before('<div class="default-skin"></div>');
        $( '#ui-datepicker-div' ).appendTo( '.default-skin' ).contents();
    });
</script>
@endpush