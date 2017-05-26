<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bali Klasik - Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Paper - Material Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link rel="shortcut icon" href="{{ url('assets/backend') }}/img/logo-icon-dark.png">

    <link type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500' rel='stylesheet'>
    <link href="{{ url('assets/backend') }}/icons/material-icons.css" type="text/css" rel="stylesheet">

    <link href="{{ url('assets/backend') }}/fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">        <!-- Font Awesome -->
    <link href="{{ url('assets/backend') }}/css/styles.css" type="text/css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link href="{{ url('assets/backend') }}/plugins/codeprettifier/prettify.css" type="text/css" rel="stylesheet">                <!-- Code Prettifier -->

    <link href="{{ url('assets/backend') }}/plugins/dropdown.js/jquery.dropdown.css" type="text/css" rel="stylesheet">            <!-- iCheck -->
    <link href="{{ url('assets/backend') }}/plugins/progress-skylo/skylo.css" type="text/css" rel="stylesheet">                   <!-- Skylo -->

    <!--[if lt IE 10]>
        <script src="{{ url('assets/backend') }}/js/media.match.min.js"></script>
        <script src="{{ url('assets/backend') }}/js/respond.min.js"></script>
        <script src="{{ url('assets/backend') }}/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    @stack('plugin_css')

</head>

<body class="animated-content infobar-overlay">


<header id="topnav" class="navbar navbar-default navbar-fixed-top navbar-cyan" role="banner">
    <!-- <div id="page-progress-loader" class="show"></div> -->

    <div class="logo-area">
        <a class="navbar-brand navbar-brand-info " href="{{ url('admin') }}">
            <img class="show-on-collapse img-logo-white" alt="Paper" src="{{ url('assets/backend') }}/img/logo-icon-white.png">
            <img class="show-on-collapse img-logo-dark" alt="Paper" src="{{ url('assets/backend') }}/img/logo-icon-dark.png">
            <img class="img-white" alt="Paper" src="{{ url('assets') }}/images/logo.png">
            <img class="img-dark" alt="Paper" src="{{ url('assets') }}/images/logo.png">
        </a>

        <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg stay-on-search">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
				<span class="icon-bg">
					<i class="material-icons">menu</i>
				</span>
			</a>
		</span>
    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">
        <?php
            $payments = \App\Models\Payment::where(['status'=>\App\Models\Payment::STATUS_WAITING_APPROVED])->get();
            $count_payument = $payments->count();
        ?>
        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="material-icons">notifications</i></span><span class="badge badge-teal">{{ $count_payument > 0 ? $count_payument : null }}</span></a>
            <div class="dropdown-menu animated notifications">
                <div class="topnav-dropdown-header">
                    <span>{{ $count_payument }} new payment</span>
                </div>
                <div class="scroll-pane">
                    <ul class="media-list scroll-content">
                        @foreach($payments as $payment)
                        <li class="media notification-info">
                            <a href="{{ route('admin.transaction.detail',$payment->transaksi_id) }}">
                                <div class="media-left">
                                    <span class="notification-icon"><i class="material-icons">shopping_cart</i></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="notification-heading">A new payment has been placed.</h4>
                                    <span class="notification-time">{{ date('d F, H:i',strtotime($payment->created_at)) }}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>

        <li class="toolbar-icon-bg appear-on-search ov-h" id="trigger-search-close">
            <a class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">close</i>
	        </span></i></a>
        </li>
        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">fullscreen</i>
	        </span></i></a>
        </li>
    </ul>

</header>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-sidebar-wrapper sidebar-cyan">
            <div class="static-sidebar">
                <div class="sidebar">
                    <div class="widget" id="widget-profileinfo">
                        <div class="widget-body">
                            <div class="userinfo ">
                                <div class="avatar pull-left">
                                    <img src="{{ url('assets/backend') }}/demo/avatar/avatar_15.png" class="img-responsive img-circle">
                                </div>
                                <div class="info">
                                    <span class="username">{{ Auth::user()->name }}</span>
                                    <span class="useremail">{{ Auth::user()->email }}</span>
                                </div>

                                <div class="acct-dropdown clearfix dropdown">
                                    <span class="pull-left"><span class="online-status online"></span>Online</span>
                                    <!-- <span class="pull-right dropdown-toggle" data-toggle="dropdown"><a href="javascript:void(0)" class="btn btn-fab-caret btn-xs btn-fab"><i class="material-icons">arrow_drop_down</i><div class="ripple-container"></div></a></span>
                                    <ul class="dropdown-menu">
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" class="widget-body">
                            <ul class="acc-menu">
                                <li class="nav-separator"><span>Navigation</span></li>
                                <li><a  class="withripple" href="{{ url('admin') }}"><span class="icon"><i class="material-icons">home</i></span><span>Dashboard</span></a></li>
                                <li><a  class="withripple" href="{{ route('admin.paket.manage') }}"><span class="icon"><i class="material-icons">account_balance_wallet</i></span><span>Wedding Package</span></a></li>
                                <li><a  class="withripple" href="{{ route('admin.item.manage') }}"><span class="icon"><i class="material-icons">add_shopping_cart</i></span><span>Extra Item</span></a></li>
                                <li><a  class="withripple" href="{{ route('admin.transaction.manage') }}"><span class="icon"><i class="material-icons">monetization_on</i></span><span>Transaction</span></a></li>
                                <li><a  class="withripple" href="{{ route('admin.gallery.manage') }}"><span class="icon"><i class="material-icons">photo_library</i></span><span>Gallery</span></a></li>
                                <li><a  class="withripple" href="javascript:;"><span class="icon"><i class="material-icons">supervisor_account</i></span><span>Users</span></a>
                                    <ul class="acc-menu">
                                        <li><a  class="withripple" href="{{ route('admin.user.member.manage') }}">Member</a></li>
                                        <li><a  class="withripple" href="{{ route('admin.user.admin.manage') }}">Admin</a></li>
                                    </ul>
                                </li>
                                <li><a  class="withripple" href="{{ route('admin.report.period') }}"><span class="icon"><i class="material-icons">description</i></span><span>Report</span></a></li>
                                <li>
                                    <a  class="withripple" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="icon"><i class="material-icons">reply</i></span>
                                        <span>Logout</span>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-content-wrapper">
            <div class="static-content">
                @yield('content')
            </div>
            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">Copyright © {{ date('Y') }} Bali Klasik. All Rights Reserved</h6></li>
                    </ul>
                </div>
            </footer>

        </div>
    </div>
</div>

</div>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script src="{{ url('assets/backend') }}/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script src="{{ url('assets/backend') }}/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script src="{{ url('assets/backend') }}/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script src="{{ url('assets/backend') }}/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script src="{{ url('assets/backend') }}/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script src="{{ url('assets/backend') }}/plugins/velocityjs/velocity.ui.min.js"></script>

<script src="{{ url('assets/backend') }}/plugins/progress-skylo/skylo.js"></script> 		<!-- Skylo -->

<script src="{{ url('assets/backend') }}/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script src="{{ url('assets/backend') }}/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script src="{{ url('assets/backend') }}/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->

<script src="{{ url('assets/backend') }}/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script src="{{ url('assets/backend') }}/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script src="{{ url('assets/backend') }}/plugins/dropdown.js/jquery.dropdown.js"></script> <!-- Fancy Dropdowns -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap-material-design/js/material.min.js"></script> <!-- Bootstrap Material -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap-material-design/js/ripples.min.js"></script> <!-- Bootstrap Material -->

<script src="{{ url('assets/backend') }}/js/application.js"></script>
<script src="{{ url('assets/backend') }}/demo/demo.js"></script>

<!-- End loading site level scripts -->

<!-- Load page level scripts-->
@stack('plugin_scripts')
<!-- End loading page level scripts-->


@stack('scripts')
</body>
</html>