@extends('layouts.frontend')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/jquery-ui.css">
<style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
        font-size: 20px;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
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
                        <h1>Invoice</h1>
                        <p>This is your invoice for transaction #{{ $transaksi->id }}.</p>
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
                        <li class="active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="well-box">
                        <div class="invoice-box">
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="{{ url('assets/images/logo.png') }}" style="width:100px; max-width:300px;">
                                                </td>

                                                <td>
                                                    Invoice #: {{ $transaksi->id }}<br>
                                                    Created: <?= date("F d, Y",strtotime($transaksi->created_at)) ?><br>
                                                    Due: <?= date("F d, Y",strtotime("+1 days",strtotime($transaksi->created_at))) ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="information">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td>
                                                    Bali Klasik.<br>
                                                    {{ env('OWNER_ADDRESS') }}<br>
                                                    {{ env('OWNER_PHONE') }}
                                                </td>

                                                <td>
                                                    <?= $transaksi->member->nama ?><br>
                                                    <?= $transaksi->member->no_hp ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="heading">
                                    <td>
                                        Payment Method
                                    </td>

                                    <td>
                                    </td>
                                </tr>

                                <tr class="details">
                                    <td>
                                        Transfer Bank
                                    </td>

                                    <td>

                                    </td>
                                </tr>

                                <tr class="heading">
                                    <td>
                                        Item
                                    </td>

                                    <td>
                                        Price
                                    </td>
                                </tr>

                                <?php foreach ($transaksi->detail as $detail): ?>
                                <tr class="item">
                                    <td>
                                        <?= $detail->item ?> x <?= $detail->qty ?>
                                    </td>
                                    <td>
                                        Rp <?= number_format($detail->total,0,',','.') ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <tr class="total">
                                    <td></td>

                                    <td>
                                        Total: Rp <?= number_format($transaksi->getTotal(),0,',','.') ?>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <br>
                        <center><a href="#" class="btn btn-primary btn-lg">Continue to payment <i class="fa fa-arrow-right" aria-hidden="true"></i></a></center>
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