@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.gallery.manage') }}">Gallery</a></li>

        </ol>
        <div class="page-heading">
            <h1>Wedding Gallery<small>Wedding Gallery</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Image</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Image Title</small></h4>
                                            <h4>{{ $model->title }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Image Descriptions</small></h4>
                                            <h4>{{ $model->deskripsi }}</h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ url('images/'.$model->image) }}" width="100%" height="100%"><br>
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