@extends('layouts.admin')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.css?v=2.1.5">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.transaction.manage') }}">Paket</a></li>
        </ol>
        <div class="page-heading">
            <h1>Transaction<small>Transaction</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Transaction</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                @if($model->status == \App\Models\Transaksi::STATUS_PAID)
                                    <a class="btn btn-lg btn-primary btn-raised btn-label complete_transaction" href="javascript:null" data-id="{{ $model->id }}"><i class="fa fa-check"></i> Complete Transaction<div class="ripple-container"></div></a>
                                @endif
                                @if($model->status == \App\Models\Transaksi::STATUS_WAITING_PAYMENT)
                                    <a class="btn btn-lg btn-danger btn-raised btn-label cancel_transaction" href="javascript:null" data-id="{{ $model->id }}"><i class="fa fa-check"></i> Cancel Transaction<div class="ripple-container"></div></a>
                                @endif
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Member Name</small></h4>
                                            <h4>{{ $model->member->nama }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Weding Date</small></h4>
                                            <h4>{{ date('d F Y',strtotime($model->wedding_date)) }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Location</small></h4>
                                            <h4>{{ $model->alamat.' - '.$model->city }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Total</small></h4>
                                            <h4>Rp {{ number_format($model->getTotal(),0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Paid</small></h4>
                                            <h4>Rp {{ number_format($model->getTotalPaid(),0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Status</small></h4>
                                            <h4>{{ $model->getStatus() }}</h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Detail Transaction</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    @foreach($model->detail as $detail)
                                        <tr>
                                            <td>
                                                <h4><small>Item</small></h4>
                                                <h4>{{ $detail->item }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Price</small></h4>
                                                <h4>{{ number_format($detail->harga ,0,',','.') }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Qty</small></h4>
                                                <h4>{{ $detail->qty }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Total</small></h4>
                                                <h4>{{ number_format($detail->total ,0,',','.') }}</h4>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Payment</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    @foreach($model->payment as $payment)
                                        <tr>
                                            <td>
                                                <h4><small>Image</small></h4>
                                                <h4>
                                                    <a href="{{ url('images/payment/'.$payment->image) }}" class="fancybox-effects-d" title="Total : {{ number_format($payment->total_transfer ,0,',','.') }}">
                                                        <img src="{{ url('images/payment/'.$payment->image) }}" width="300" height="200">
                                                    </a>
                                                </h4>
                                            </td>
                                            <td>
                                                <h4><small>Total Transfer</small></h4>
                                                <h4>{{ number_format($payment->total_transfer ,0,',','.') }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Date Transfer</small></h4>
                                                <h4>{{ date('d F Y',strtotime($payment->date_transfer)) }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Bank</small></h4>
                                                <h4>{{ $payment->getBank() }}</h4>
                                            </td>
                                            <td>
                                                <h4><small>Status</small></h4>
                                                <h4>{{ $payment->getStatus() }}</h4>
                                                @if($payment->status == \App\Models\Payment::STATUS_WAITING_APPROVED)
                                                    <a href="javascript:null" data-id="{{ $payment->id }}" class="btn btn-danger btn-raised btn-xs canceled"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                                                    <a href="javascript:null" data-id="{{ $payment->id }}" class="btn btn-success btn-raised btn-xs approved"><i class="fa fa-check"></i><div class="ripple-container"></div></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<!-- Initialize scripts for this page-->
<script src="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
@endpush

@push('scripts')
<script>
    $(".canceled").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure want to cancel this payment?');
        if(p==true){
            window.location = "<?= url('admin/transaction/cancel') ?>/"+id;
        }else{

        }
    });

    $(".approved").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure want to approved this payment?');
        if(p==true){
            window.location = "<?= url('admin/transaction/approve') ?>/"+id;
        }else{

        }
    });

    $(".complete_transaction").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure want to complete this transaction?');
        if(p==true){
            window.location = "<?= url('admin/transaction/complete_transaction') ?>/"+id;
        }else{

        }
    });

    $(".cancel_transaction").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure want to cancel this transaction?');
        if(p==true){
            window.location = "<?= url('admin/transaction/cancel_transaction') ?>/"+id;
        }else{

        }
    });
</script>
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