@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.css?v=2.1.5">
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
                    <div class="col-md-12">
                        <a class="btn btn-lg btn-primary btn-raised btn-label" href="{{ route('admin.gallery.create') }}"><i class="fa fa-download"></i> Add New Data<div class="ripple-container"></div></a>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Data Tables</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>
                                                <a href="{{ url('images/'.$row->image) }}" class="fancybox-effects-d" title="{{ $row->deskripsi }}">
                                                    <img src="{{ url('images/'.$row->image) }}" width="150" height="100">
                                                </a>
                                            </td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->deskripsi }}</td>
                                            <td class="center" width="80">
                                                <a href="javascript:null" data-id="{{ $row->id }}" class="btn btn-danger btn-raised btn-xs hapus"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                                                <!-- <a href="{{ route('admin.gallery.detail',$row->id) }}" class="btn btn-info btn-raised btn-xs"><i class="fa fa-eye"></i><div class="ripple-container"></div></a></td> -->
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
<script src="{{ url('assets') }}/plugins/fancyapps-fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
@endpush

@push('scripts')
<script>
    $(".hapus").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure to delete this data?');
        if(p==true){
            window.location = "<?= url('admin/gallery/delete') ?>/"+id;
        }else{

        }
    });
</script>
<script>
    $(".fancybox-effects-d").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,

        closeClick : true,

        helpers : {
            overlay : null
        }
    });
</script>
@endpush