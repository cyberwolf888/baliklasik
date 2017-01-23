@extends('layouts.frontend')

@push('plugin_css')
@endpush

@section('content')
    <div class="tp-dashboard-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 profile-header">
                    <div class="profile-pic col-md-2"><img src="{{ url('assets') }}/images/couple-profile.jpg" alt="" class="img-circle"></div>
                    <div class="profile-info col-md-9">
                        <h1 class="profile-title">{{ Auth::user()->name }}<small>Welcome Back Couple</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.page header -->
    <div class="tp-dashboard-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 dashboard-nav">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{ route('member.dashboard') }}"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                        <li class="active"><a href="{{ route('member.transaction.manage') }}"><i class="fa fa-calculator db-icon"></i>My Wedding</a></li>
                        <li><a href="{{ route('member.profile.manage') }}"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="page-title">
                                    <h1>Add Items <small>Create your wedding to do and start planning.</small></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 dashboard-form calender">
                            {!! Form::open(['route' => ['member.transaction.store_item',$id],'class'=>'form-horizontal','files' => true]) !!}
                            <div class="bg-white pinside40 mb30">
                                <!-- Text input-->
                                <h2 class="form-title">Item Infomations</h2>
                                <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="item">Items <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="item" id="item" required>
                                            @foreach(\App\Models\Items::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama.' - Rp. '.number_format($item->harga,0,',','.').'/'.$item->satuan }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('item'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('item') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="qty">Qty <span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="qty" name="qty" type="number" placeholder="Qty" class="form-control input-md" required="" value="{{ old('qty') }}">
                                        @if ($errors->has('qty'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('qty') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="qty">Total</label>
                                    <div class="col-md-8">
                                        <input id="total" name="total" type="text" placeholder="Total" class="form-control input-md" required="" value="{{ old('total') }}" readonly>
                                        @if ($errors->has('total'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary">Add item</button>
                                    </div>
                                </div>
                            </div>
                            </form>
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
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var item = $('#item');
    var qty = $('#qty');
    var total = $('#total');

    item.change(function () {
        getTotal();
    });
    qty.change(function () {
        getTotal();
    });
    function getTotal(){
        var markers = '';
        $.ajax({
            url: '<?= route('member.transaction.getTotalItem',$id) ?>',
            type: 'POST',
            data: {_token: CSRF_TOKEN, qty:qty.val(), item:item.val()},
            dataType: 'JSON',
            success: function (data) {
                markers = JSON.stringify(data);
                var obj = jQuery.parseJSON( markers );
                console.log(obj);
                total.val(obj.total);
            }
        });
    }
</script>
@endpush