@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/') }}/plugins/datatables/buttons.dataTables.min.css" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.report.period') }}">Report</a></li>

        </ol>
        <div class="page-heading">
            <h1>Report {{ $start_date }} - {{ $end_date }}<small>Transaction</small></h1>
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
                                <table id="result" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Transaction Date</th>
                                        <th>Member Name</th>
                                        <th>Wedding Date</th>
                                        <th>Location</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ date('d/m/Y',strtotime($row->created_at)) }}</td>
                                            <td>{{ $row->member->nama }}</td>
                                            <td>{{ date('d F Y',strtotime($row->wedding_date)) }}</td>
                                            <td>{{ $row->alamat.' - '.$row->city }}</td>
                                            <td>Rp {{ number_format($row->getTotal(),0,',','.') }}</td>
                                            <td>Rp {{ number_format($row->getTotalPaid(),0,',','.') }}</td>
                                            <td> {{ $row->getStatus() }}</td>
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
<script src="{{ url('assets/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="{{ url('assets/') }}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{ url('assets/') }}/plugins/datatables/jszip.min.js"></script>
<script src="{{ url('assets/') }}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{ url('assets/') }}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{ url('assets/') }}/plugins/datatables/buttons.html5.min.js"></script>
@endpush

@push('scripts')
<script>
    $('#result').dataTable({
        "language": {
            "lengthMenu": "_MENU_"
        },
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    $('.dataTables_filter input').attr('placeholder','Search...');


    //DOM Manipulation to move datatable elements integrate to panel
    $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
    $('.panel-ctrls').append("<i class='separator'></i>");
    $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

    $('.panel-footer').append($(".dataTable+.row"));
    $('.dataTables_paginate>ul.pagination').addClass("pull-right m-n");
</script>
@endpush