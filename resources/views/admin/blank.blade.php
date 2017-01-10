@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.paket.manage') }}">Paket</a></li>

        </ol>
        <div class="page-heading">
            <h1>Dashboard<small>Project Statistics</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">

            <div data-widget-group="group1">

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Panel</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                Asperiores porro eveniet debitis quas sed harum nobis libero voluptatibus dolorum odio at veniam aut id corrupti hic amet consectetur adipisicing tenetur ex ea dignissimos volupta elit esse quisquam fugiat.
                            </div>
                            <div class="panel-footer">
                                <span class="text-gray"><em>Footer</em></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Panel</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                Asperiores porro eveniet debitis quas sed harum nobis libero voluptatibus dolorum odio at veniam aut id corrupti hic amet consectetur adipisicing tenetur ex ea dignissimos volupta elit esse quisquam fugiat.
                            </div>
                            <div class="panel-footer">
                                <span class="text-gray"><em>Footer</em></span>
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
@endpush

@push('scripts')
@endpush