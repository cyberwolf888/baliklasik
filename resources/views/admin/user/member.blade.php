@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.user.member.manage') }}">User</a></li>
            <li class="active"><a href="{{ route('admin.user.member.manage') }}">Member</a></li>

        </ol>
        <div class="page-heading">
            <h1>Manage User<small>Member</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-lg btn-primary btn-raised btn-label" href="{{ route('admin.user.member.create') }}"><i class="fa fa-download"></i> Add New Data<div class="ripple-container"></div></a>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Data Tables</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->no_hp }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->user->getStatus() }}</td>
                                            <td class="center" width="100">
                                                <!-- <a href="javascript:null" data-id="{{ $row->id }}" class="btn btn-danger btn-raised btn-xs hapus"><i class="fa fa-close"></i><div class="ripple-container"></div></a> -->
                                                <a href="{{ route('admin.user.member.edit',$row->id) }}" class="btn btn-warning btn-raised btn-xs"><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
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
<script>
    $(".hapus").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure to delete this data?');
        if(p==true){
            window.location = "<?= url('admin/user/member/delete') ?>/"+id;
        }else{

        }
    });
</script>
@endpush