@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/form-daterangepicker/daterangepicker-bs3.css" type="text/css" rel="stylesheet">    <!-- DateRangePicker -->
<link href="{{ url('assets/backend') }}/plugins/fullcalendar/fullcalendar.css" type="text/css" rel="stylesheet">                   <!-- FullCalendar -->
<link href="{{ url('assets/backend') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/less/card.less" type="text/css" rel="stylesheet">

<link href="{{ url('assets/backend') }}/plugins/chartist/dist/chartist.min.css" type="text/css" rel="stylesheet"> <!-- chartist -->
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="index-2.html">Home</a></li>
            <li class="active"><a href="index-2.html">Dashboard</a></li>

        </ol>
        <div class="page-heading">
            <h1>Dashboard<small>Project Statistics</small></h1>
            <div class="options">
            <!--  <div class="btn-toolbar">
        <form action="" class="form-horizontal row-border" style="display: inline-block;">
            <div class="form-group hidden-xs">
                <div class="col-sm-8">
                    <button class="btn btn-default" id="daterangepicker-d">
                        <i class="fa fa-calendar"></i>
                        <span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
                    </button>
                </div>
            </div>
        </form>
        <a href="#" class="btn btn-default" style="vertical-align: top;">Settings</a>
    </div> -->
            </div>
        </div>
        <div class="container-fluid">


            <div data-widget-group="group1">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-indigo">
                            <div class="info">
                                <div class="tile-heading"><span>Page Views</span></div>
                                <div class="tile-body"><span>5,921</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-indigo"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-danger">
                            <div class="info">
                                <div class="tile-heading"><span>Aquisitions</span></div>
                                <div class="tile-body "><span>2,344</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-gray"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-primary">
                            <div class="info">
                                <div class="tile-heading"><span>Conversions</span></div>
                                <div class="tile-body "><span>1,032</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-primary"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-success clearfix">
                            <div class="info">
                                <div class="tile-heading"><span>Returning</span></div>
                                <div class="tile-body "><span>1,454</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-success"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 full-width">
                        <div class="panel panel-default no-shadow" data-widget='{"draggable": "false"}'>
                            <div class="panel-controls dropdown">
                                <button class="btn btn-icon-rounded refresh-panel"><span class="material-icons inverted">refresh</span></button>
                                <button class="btn btn-icon-rounded dropdown-toggle" data-toggle="dropdown"><span class="material-icons inverted">more_vert</span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="pb-md">
                                    <h4 class="mb-n">SALES STATISTICS<small>Aliquam tincidunt mauris eu risus.</small></h4>

                                </div>
                                <div id="fullChart" style="height: 325px " class="centered"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<!-- Charts -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.min.js"></script>                 <!-- Flot Main File -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.pie.min.js"></script>             <!-- Flot Pie Chart Plugin -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.stack.min.js"></script>           <!-- Flot Stacked Charts Plugin -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.resize.min.js"></script>          <!-- Flot Responsive -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.tooltip.min.js"></script>         <!-- Flot Tooltips -->
<script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.spline.js"></script>              <!-- Flot Curved Lines -->
<script src="{{ url('assets/backend') }}/plugins/easypiechart/jquery.easypiechart.min.js"></script>        <!-- EasyPieChart-->
<script src="{{ url('assets/backend') }}/plugins/curvedLines-master/curvedLines.js"></script>              <!-- marvinsplines -->

<script src="{{ url('assets/backend') }}/plugins/form-daterangepicker/moment.min.js"></script>             <!-- Moment.js for Date Range Picker -->

<!-- Date Range Picker -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>               <!-- Datepicker -->
<!-- <script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> --> <!-- DateTime Picker -->

<!-- <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>   -->    <!-- jVectorMap -->
<!-- <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>  --> <!--World Map-->
<script src="{{ url('assets/backend') }}/plugins/chartist/dist/chartist.min.js"></script> <!-- chartist -->
<script src="{{ url('assets/backend') }}/demo/demo-index.js"></script>                                     <!-- Initialize scripts for this page-->
@endpush

@push('scripts')
@endpush