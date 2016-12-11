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
                            <i class="icon icon-size-60 icon-telephone icon-white"></i>
                        </div>
                        <h1>Contact Us</h1>
                        <p>Fusce volutpat turpis sit amet justo venenatis vestibul leo augue.</p>
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
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well-box">
                        <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                        <form>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="first">Your Name <span class="required">*</span></label>
                                <input id="first" name="first" type="text" placeholder="First Name" class="form-control input-md" required>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
                                <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class=" control-label" for="phone">Phone <span class="required">*</span></label>
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="  control-label" for="message">Message</label>
                                <textarea class="form-control" rows="6" id="message" name="message">Write Your Message</textarea>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 contact-info">
                    <div class="well-box">
                        <ul class="listnone">
                            <li class="address">
                                <h2><i class="fa fa-map-marker"></i>Location</h2>
                                <p>Jalan Denpasar No. xxx</p>
                            </li>
                            <li class="email">
                                <h2><i class="fa fa-envelope"></i>E-Mail</h2>
                                <p>Info@baliklasik.com</p>
                            </li>
                            <li class="call">
                                <h2><i class="fa fa-phone"></i>Contact</h2>
                                <p>+6200-123-4567</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well-box">
                        <h2>Need Help ?</h2>
                        <p>We're here to help, 24 hours a day, 7 days a week.</p>
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