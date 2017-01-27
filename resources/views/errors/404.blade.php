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
                        <div class="icon-circle"> <i class="icon icon-size-60 icon-heart icon-white"></i> </div>
                        <h1>Error Page</h1>
                        <p>Not found error page donec sodales arcu odio, eu egestas sem venenatis vel</p>
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
                        <li class="active">404 Error</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-block mb80">
                        <h1>404</h1>
                        <h2><i class="fa fa-warning"></i>oooopppss! page was not found, Sorry! it looks like that page has gone missing.</h2>
                        <p>Please use navigation above to browse wedding topics, or go back to <a href="{{ url('/') }}">home.</a> </p>
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