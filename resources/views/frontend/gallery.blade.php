@extends('layouts.frontend')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.css?v=2.1.5">
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
                        <li class="active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                @foreach(\App\Models\Gallery::all() as $gallery)
                    <div class="col-md-3 vendor-box">
                        <!-- venue box start-->
                        <div class="vendor-image">
                            <!-- venue pic -->
                            <a href="{{ url('images/'.$gallery->image) }}" class="fancybox-effects-d" title="{{ $gallery->deskripsi }}"><img src="{{ url('images/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="img-responsive"></a>
                            <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                        </div>
                        <!-- /.venue pic -->
                        <div class="vendor-detail">
                            <!-- venue details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title">{{ $gallery->title }}</a></h2>
                            </div>
                        </div>
                        <!-- venue details -->
                    </div>
                @endforeach
            </div>
            <!-- <div class="row">
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
            </div> -->
        </div>
    </div>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
@endpush

@push('scripts')
<script>
    $(".fancybox-effects-d").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,

        closeClick : true,

        helpers : {
            overlay : null
        }
    });
</script>
@endpush