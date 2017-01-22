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
                                    <h1>My Wedding <small>Create your wedding to do and start planning.</small></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="budget-board">
                <div class="list-group">
                    <div href="#" class="list-group-item active">
                        <div class="row">
                            <div class="col-md-3"> Package </div>
                            <div class="col-md-2">Wedding Date</div>
                            <div class="col-md-3">Location</div>
                            <div class="col-md-2">Total</div>
                            <div class="col-md-1">Status</div>
                        </div>
                    </div>
                    @foreach($model as $row)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-3"><a class="#" data-toggle="collapse" href="#Ceremony{{ $row->id }}" aria-expanded="false" aria-controls="Ceremony"> {{ $row->getLabel() }} </a> </div>
                                <div class="col-md-2">{{ date('d F Y',strtotime($row->wedding_date)) }}</div>
                                <div class="col-md-3">{{ $row->alamat.', '.$row->city }}</div>
                                <div class="col-md-2">{{ number_format($row->getTotal(),0,',','.') }}</div>
                                <div class="col-md-1">{{ $row->getStatus() }}</div>
                                <div class="collapse col-md-12 item-title" id="Ceremony{{ $row->id }}">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <div class="col-md-12"><h3>Detail Items</h3></div>
                                            <table class="table ceremony">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-4">Item</th>
                                                    <th class="col-md-2">Price</th>
                                                    <th class="col-md-2">Qty</th>
                                                    <th class="col-md-1">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($row->detail as $detail)
                                                    <tr>
                                                        <th scope="row"> {{ $detail->item }}</th>
                                                        <td>Rp {{ number_format($detail->harga,0,',','.') }}</td>
                                                        <td>{{ $detail->qty }}</td>
                                                        <td>Rp {{ number_format($detail->total,0,',','.') }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row" colspan="3"> <center><b>Total</b></center></th>
                                                    <td>Rp {{ number_format($row->getTotal(),0,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="3"> <center><b>Total Paid</b></center></th>
                                                    <td>Rp {{ number_format($row->getTotal(),0,',','.') }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a href="#" title="add new items" class="btn btn-primary add-item">+ Add Item</a> </div><br><br>

                                        <div class="col-md-12"><h3>Detail Payment</h3></div>
                                        <table class="table ceremony">
                                            <thead>
                                            <tr>
                                                <th class="col-md-4">Image</th>
                                                <th class="col-md-2">Total Transfer</th>
                                                <th class="col-md-2">Transfer Date</th>
                                                <th class="col-md-1">Bank</th>
                                                <th class="col-md-1">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($row->payment as $payment)
                                                <tr>
                                                    <th scope="row"> <img src="{{ url('images/payment/'.$payment->image) }}" width="200" height="150"> </th>
                                                    <td>Rp {{ number_format($payment->total_transfer,0,',','.') }}</td>
                                                    <td>{{ date('d F Y',strtotime($payment->date_transfer)) }}</td>
                                                    <td>{{ $payment->getBank() }}</td>
                                                    <td>{{ $payment->getStatus() }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <a href="{{ route('member.transaction.payment',$row->id) }}" title="add new payment" class="btn btn-primary add-item">+ Add Payment</a> </div><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush