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
                {!! Form::open(['route' => isset($update) ? ['admin.paket.update', $model->id] : 'admin.paket.store']) !!}
                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>Oh Snap!</h4>
                                <p>There is some error in your field value, please check field listed bellow.</p> <br>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close"></i>&nbsp; {{ $error }}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
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
                                        {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'Package Name','class'=>'form-control', 'required']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <label for="harga" class="control-label">Package Price</label>
                                        {!! Form::number('harga', $model->harga, ['id'=>'harga','placeholder'=>'Package harga','class'=>'form-control', 'required']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="control-label">Package Status</label>
                                        {!! Form::select('status', ['1' => 'Active', '0' => 'Non Active'], $model->status, ['class'=>'form-control','required']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group is-empty">
                                        <label for="deskripsi" class="control-label">Package Description</label>
                                        {!! Form::textarea('deskripsi', $model->deskripsi, ['id'=>'deskripsi','placeholder'=>'Package Description','class'=>'form-control','rows'=>3, 'required']) !!}
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
                                <div class="panel-body input_fields_wrap" >
                                    <button type="button" class="btn btn-success btn-raised add_field_button">Add More Fields</button>

                                    @if(isset($update))
                                        @foreach($model->detail as $detail)
                                            <div class="input-group">
                                                <span class="input-group-btn remove_field">
                                                    <button class="btn btn-raised btn-default " type="button"><i class="material-icons prefix">delete</i></button>
                                                </span>
                                                {!! Form::text('detail[]', $detail->value, ['id'=>'nama','placeholder'=>'Package Detail','class'=>'form-control', 'required']) !!}
                                            </div>
                                        @endforeach

                                    @else
                                        <div class="input-group">
                                        <span class="input-group-btn remove_field">
                                            <button class="btn btn-raised btn-default " type="button"><i class="material-icons prefix">delete</i></button>
                                        </span>
                                            {!! Form::text('detail[]', null, ['id'=>'nama','placeholder'=>'Package Detail','class'=>'form-control', 'required']) !!}
                                        </div>
                                    @endif
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
<script>
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                $(wrapper).append('<div class="input-group">' +
                        '<span class="input-group-btn remove_field">' +
                        '<button class="btn btn-raised btn-default " type="button"><i class="material-icons prefix">delete</i></button>' +
                        '</span>' +
                        '<?php echo Form::text('detail[]', null, ['id'=>'nama','placeholder'=>'Package Detail','class'=>'form-control', 'required']); ?>' +
                        '</div> '); //add input box
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
@endpush