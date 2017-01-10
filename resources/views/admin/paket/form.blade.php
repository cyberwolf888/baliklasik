@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.paket.manage') }}">Paket</a></li>
            <li class="active"><a href="{{ route('admin.paket.manage') }}">Form</a></li>
        </ol>
        <div class="page-heading">
            <h1>Wedding Package<small>Wedding Plan</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => 'admin.paket.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Data Package</h2>
                                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                </div>
                                <div class="panel-body" >
                                    <div class="form-group is-empty">
                                        <label for="nama" class="control-label">Package Name</label>
                                        {!! Form::text('nama', $model->name, ['id'=>'nama','placeholder'=>'Package Name','class'=>'form-control']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <label for="harga" class="control-label">Package Price</label>
                                        {!! Form::text('harga', $model->harga, ['id'=>'harga','placeholder'=>'Package harga','class'=>'form-control']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <label for="status" class="control-label">Package Status</label>
                                        {!! Form::text('status', $model->name, ['id'=>'status','placeholder'=>'Package status','class'=>'form-control']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label">Package Status</label>

                                        {!! Form::select('status', ['1' => 'Active', '0' => 'Non Active'], null, ['class'=>'form-control','required']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <label for="deskripsi" class="control-label">Package Description</label>
                                        {!! Form::text('deskripsi', $model->name, ['id'=>'deskripsi','placeholder'=>'Package Description','class'=>'form-control']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    {{ Form::submit('Save',['class'=>'btn btn-primary btn-raised']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                                <div class="panel-heading">
                                    <h2>Detail Package</h2>
                                    <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                                </div>
                                <div class="panel-body" >
                                    <div class="form-group is-empty">
                                        <label for="nama" class="control-label">Package Name</label>
                                        {!! Form::text('nama', $model->name, ['id'=>'nama','placeholder'=>'Package Name','class'=>'form-control']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <!-- <span class="text-gray"><em>Footer</em></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<!-- Initialize scripts for this page-->
@endpush

@push('scripts')
@endpush