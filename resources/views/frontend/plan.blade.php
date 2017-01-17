@extends('layouts.frontend')

@push('plugin_css')
<style>
    .price-plan {
        font-size: 35px;
        font-weight: 700;
    }
</style>
@endpush

@section('content')
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-budget icon-white"></i>
                        </div>
                        <h1>Pricing Table</h1>
                        <p>FPlease specify your wedding activities and then select the package that suits your wedding.</p>
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
                        <li class="active">Pricing Table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row pricing-container">
                @foreach(\App\Models\Paket::where('status',1)->get() as $paket)
                <div class="col-md-4 pricing-box pricing-box-regualr">
                    <div class="well-box">
                        <h2 class="price-title">{{ $paket->nama }}</h2>
                        <h1 class="price-plan"><span class="dollor-sign">IDR</span> {{ number_format($paket->harga,0,',','.') }}</h1>
                        <p>{{ $paket->deskripsi }}</p>
                        <a href="#" class="btn btn-default btn-sm">Select Plan</a> </div>
                    <ul class="check-circle list-group">
                        @foreach($paket->detail as $detail)
                            <li class="list-group-item">{{ $detail->value }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            <div></div>
            <div class="section-space80">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb60 text-center">
                            <h1>Do you have a question ?</h1>
                        </div>
                    </div>
                    <div class="col-md-6 question-block">
                        <div class="question-answer">
                            <h2><span class="question-sign">Q</span> Which payment methods are supported?</h2>
                            <p>For the moment we only support the booking and payment via bank transfer.</p>
                        </div>
                        <div class="question-answer">
                            <h2><span class="question-sign">Q</span> Can we change the order?</h2>
                            <p>Your order can be changed within a period of H-3 before the wedding date by contact administrator.</p>
                        </div>
                    </div>
                    <div class="col-md-6 question-block">
                        <div class="question-answer">
                            <h2><span class="question-sign">Q</span> Can I cancel or refund my order?</h2>
                            <p>Cancellation of orders can be done within a period of H-5 before the wedding date.</p>
                        </div>
                        <div class="question-answer">
                            <h2><span class="question-sign">Q</span> Can we change the vanue of event?</h2>
                            <p>You can change the date by H-7 before the wedding date by checking with the admin.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="well-box feature-left">
                        <div class="feature-icon"><i class="icon-love-letter icon-size-60 icon-default"></i></div>
                        <div class="feature-content">
                            <h3>Have questions? Contact us at</h3>
                            <p>We're here to help, 24 hours a day, 7 days a week.<strong><a href="#"> support@baliklasik.com</a></strong></p>
                        </div>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well-box feature-left">
                        <div class="feature-icon"><i class="icon-heart-shaped-balloons icon-size-60 icon-default"></i></div>
                        <div class=" feature-content">
                            <h3>Want to know how we works ?</h3>
                            <p>We are working diligently to realize your dream wedding with a perfect and memorable for you.</p>
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