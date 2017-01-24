@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.transaction.manage') }}">Transaction</a></li>

        </ol>
        <div class="page-heading">
            <h1>Transaction<small>Transaction</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Data Tables</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Wedding Date</th>
                                        <th>Location</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ $row->member->nama }}</td>
                                            <td>{{ date('d F Y',strtotime($row->wedding_date)) }}</td>
                                            <td>{{ $row->alamat.' - '.$row->city }}</td>
                                            <td>Rp {{ number_format($row->getTotal(),0,',','.') }}</td>
                                            <td>Rp {{ number_format($row->getTotalPaid(),0,',','.') }}</td>
                                            <td> {{ $row->getStatus() }}</td>
                                            <td class="center" width="80">
                                                <a href="{{ route('admin.transaction.detail',$row->id) }}" class="btn btn-info btn-raised btn-xs"><i class="fa fa-eye"></i><div class="ripple-container"></div></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets/backend') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="{{ url('assets/backend') }}/demo/demo-datatables.js"></script>
@endpush

@push('scripts')
@endpush