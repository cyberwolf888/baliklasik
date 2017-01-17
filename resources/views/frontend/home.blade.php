@extends('layouts.frontend')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/owl.transitions.css">
@endpush

@section('content')

    <div class="slider-bg">
        <!-- slider start-->
        <div id="slider" class="owl-carousel owl-theme slider">
            <div class="item"><img src="{{ url('assets') }}/images/hero-image-3.jpg" alt="Wedding couple just married"></div>
            <div class="item"><img src="{{ url('assets') }}/images/hero-image-2.jpg" alt="Wedding couple just married"></div>
            <div class="item"><img src="{{ url('assets') }}/images/hero-image.jpg" alt="Wedding couple just married"></div>
        </div>
        <div class="find-section">
            <!-- Find search section-->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 finder-block">
                        <div class="finder-caption">
                            <h1>Find your perfect Wedding Orginizer</h1>
                            <p>Over <strong>100+ Wedding Event </strong>for you special date &amp; Find the perfect venue &amp; save you date.</p>
                        </div>
                        <!--<div class="finderform">
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <select class="form-control">
                                            <option>Select Vendor Category</option>
                                            <option value="Venue">Venue</option>
                                            <option value="Photographer">Photographer</option>
                                            <option value="Cake">Cake</option>
                                            <option value="Dj">Dj</option>
                                            <option value="Florist">Florist</option>
                                            <option value="Videography">Videography</option>
                                            <option value="jewellery">Jewellery</option>
                                            <option value="Gifts">Gifts</option>
                                            <option value="Dresses">Dresses</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select class="form-control">
                                            <option>Select City</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Gandhinagar">Gandhinagar</option>
                                            <option value="Rajkot">Rajkot</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Vadodara">Vadodara</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Find Vendors</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Find search section-->
    </div>
    <!-- slider end-->

    <div class="section-space80">
        <!-- Feature Blog Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Your Wedding Planing Start Here</h1>
                        <p>We will help you to take care of all your wedding events.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- feature center -->
                <div class="col-md-4">
                    <div class="feature-block feature-center">
                        <!-- feature block -->
                        <div class="feature-icon"><img src="{{ url('assets') }}/images/vendor.svg" alt=""></div>
                        <h2>Select Package</h2>
                        <p>Please select packages available to suit your needs or budget.</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center">
                        <!-- feature block -->
                        <div class="feature-icon"><img src="{{ url('assets') }}/images/mail.svg" alt=""></div>
                        <h2>Make a Reservation</h2>
                        <p>Make reservations and payments directly through this website and wait for confirmation from us.</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center">
                        <!-- feature block -->
                        <div class="feature-icon"><img src="{{ url('assets') }}/images/couple.svg" alt=""></div>
                        <h2>Save Your Date</h2>
                        <p>Determine the date and venue of your wedding and we'll take care of everything for you.</p>
                    </div>
                </div>
                <!-- /.feature block -->
            </div>
            <!-- /.feature center -->
        </div>
    </div>
    <!-- Feature Blog End -->

    <div class="section-space80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Featured Wedding Package</h1>
                        <p>Below are some of the featured our wedding packages.</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                @foreach(\App\Models\Paket::where('status',1)->get() as $paket)
                    <div class="col-md-4">
                        <!-- vendor box start-->
                        <div class="vendor-box">
                            <div class="vendor-image">
                                <!-- vendor pic -->
                                <a href="#"><img src="{{ url('assets') }}/images/vendor-{{ $paket->id }}.jpg" alt="wedding vendor" class="img-responsive"></a>
                                <!-- <div class="feature-label"></div> -->
                                <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                            </div>
                            <!-- /.vendor pic -->
                            <div class="vendor-detail">
                                <!-- vendor details -->
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="#" class="title">{{ $paket->nama }}</a></h2>
                                    <p>{{ $paket->deskripsi }}</p>
                                    <a href="{{ route('plan') }}" class="btn btn-primary btn-sm">Learn More</a>
                                </div>
                                <!-- /.caption -->
                                <div class="vendor-price">
                                    <div class="price">IDR {{ number_format($paket->harga,0,',','.') }}</div>
                                </div>
                            </div>
                            <!-- vendor details -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section-space80">
        <!-- top location -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Top Wedding Event</h1>
                        <p>Here are some of the biggest wedding events we've ever done.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Models\Gallery::limit(6)->orderBy('id','rand')->get() as $gallery)
                    <div class="col-md-4 location-block">
                        <!-- location block -->
                        <div class="vendor-image">
                            <a href="#"><img src="{{ url('images/'.$gallery->image) }}" alt=""  width="360" height="220"></a> <a href="#" class="venue-lable"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.top location -->

@endsection

@push('plugin_scripts')
<!-- slider -->
<script src="{{ url('assets') }}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ url('assets') }}/js/slider.js"></script>
<!-- testimonial -->
<script type="text/javascript" src="{{ url('assets') }}/js/testimonial.js"></script>
@endpush

@push('scripts')
@endpush