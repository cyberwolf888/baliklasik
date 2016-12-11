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
                            <i class="icon icon-size-60 icon-menu icon-white"></i>
                        </div>
                        <h1>Gallery</h1>
                        <p>Here are some pictures of some of the wedding we had done.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Vendor List – 4 column</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-1.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-2.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-3.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-4.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-5.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-6.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-7.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="#"><img src="{{ url('assets') }}/images/vendor-8.jpg" alt="wedding venue" class="img-responsive"></a>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                <!-- /.venue box start-->
            </div>
            <div class="row">
                <div class="col-md-12 tp-pagination">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous"> <span aria-hidden="true">Previous</span> </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next"> <span aria-hidden="true">NEXT</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush