@extends('layouts.frontend')

@push('plugin_css')
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/jquery-ui.css">
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
                        <h1>Wedding Plan</h1>
                        <p>Please enter your wedding information.</p>
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
                        <li class="active">Transaction</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <form method="POST" action="{{ route('transaction.store', $id) }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="well-box">
                        <p>Please fill out the form below with correct information.</p>
                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('wedding_date') ? ' has-error' : '' }}">
                                <label class="control-label" for="weddingdate">Wedding Date<span class="required">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="wedding_date" class="form-control" id="weddingdate" placeholder="Wedding Date" required>
                                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                </div>
                                @if ($errors->has('wedding_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wedding_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class=" control-label" for="email">City <span class="required">*</span></label>
                                <select class="form-control" name="city" required>
                                    <option value="Denpasar">Denpasar</option>
                                    <option value="Badung">Badung</option>
                                    <option value="Bangli">Bangli</option>
                                    <option value="Buleleng">Buleleng</option>
                                    <option value="Gianyar">Gianyar</option>
                                    <option value="Jembrana">Jembrana</option>
                                    <option value="Karangasem">Karangasem</option>
                                    <option value="Klungkung">Klungkung</option>
                                    <option value="Tabanan">Tabanan</option>
                                </select>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                <label class="control-label" for="alamat">Veneu Address <span class="required">*</span></label>
                                <input id="alamat" name="alamat" type="text" placeholder="Veneu Address" class="form-control input-md" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="well-box">
                            <h3>Ukuran Pakian Pengantin Pria</h3>

                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('tinggi_pria') ? ' has-error' : '' }}">
                                <label class="control-label" for="tinggi_pria">Tinggi Badan (cm) <span class="required">*</span></label>
                                <input id="tinggi_pria" name="tinggi_pria" type="text" placeholder="" class="form-control input-md" value="{{ old('tinggi_pria') }}" required>
                                @if ($errors->has('tinggi_pria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tinggi_pria') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('berat_pria') ? ' has-error' : '' }}">
                                <label class="control-label" for="berat_pria">Berat Badan (kg) <span class="required">*</span></label>
                                <input id="berat_pria" name="berat_pria" type="text" placeholder="" class="form-control input-md" value="{{ old('berat_pria') }}" required>
                                @if ($errors->has('berat_pria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('berat_pria') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="well-box">
                            <h3>Ukuran Pakian Pengantin Wanita</h3>

                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('tinggi_wanita') ? ' has-error' : '' }}">
                                <label class="control-label" for="tinggi_wanita">Tinggi Badan (cm) <span class="required">*</span></label>
                                <input id="tinggi_wanita" name="tinggi_wanita" type="text" placeholder="" class="form-control input-md" value="{{ old('tinggi_wanita') }}" required>
                                @if ($errors->has('tinggi_wanita'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tinggi_wanita') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Text input-->
                            <div class="form-group{{ $errors->has('berat_wanita') ? ' has-error' : '' }}">
                                <label class="control-label" for="berat_wanita">Berat Badan (kg) <span class="required">*</span></label>
                                <input id="berat_wanita" name="berat_wanita" type="text" placeholder="" class="form-control input-md" value="{{ old('berat_wanita') }}" required>
                                @if ($errors->has('berat_wanita'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('berat_wanita') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-primary btn-lg">Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
@endpush

@push('scripts')
<script>
    $( function() {
        $( "#weddingdate" ).datepicker({
            minDate: 14,

        });
        $( '#ui-datepicker-div' ).before('<div class="default-skin"></div>');
        $( '#ui-datepicker-div' ).appendTo( '.default-skin' ).contents();
    });
</script>
@endpush