<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Are you local weddding vendor provider & looking for wedding vendor website template. Wedding Vendor Responsive Website Template suitable for wedding vendor supplier, wedding agency, wedding company, wedding events etc.. ">
    <meta name="keywords" content="Wedding Vendor, wedding template, wedding website template, events, wedding party, wedding cake, wedding dress, wedding couple, couple, Wedding Venues Website Template">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Wedding Vendor | Find The Best Wedding Vendors</title>
    <!-- Bootstrap -->
    <link href="{{ url('assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template style.css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/fontello.css">

    @stack('plugin_css')
    <!-- Font used in template -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--font awesome icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ url('assets') }}/images/favicon.ico" type="image/x-icon">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="collapse" id="searcharea">
    <!-- top search -->
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Search</button>
          </span>
    </div>
</div>
<!-- /.top search -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 top-message">
                <p>Welcome to Bali Klasik Wedding Planner & Organizer</p>
            </div>
            <div class="col-md-6 top-links">
                <ul class="listnone">
                    @if (Auth::guest())
                    <li><a href="{{ url('register') }}">Register</a></li>
                    <li><a href="{{ url('login') }}">Log in</a></li>
                    @else
                        @role('admin')
                            <li><a href="{{ url('admin') }}">My Account</a></li>
                        @endrole
                        @role('member')
                            <li><a href="{{ url('member') }}">My Account</a></li>
                        @endrole
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 logo">
                <div class="navbar-brand">
                    <a href="{{ url('/') }}"><img src="{{ url('assets') }}/images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="navigation" id="navigation">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li class="active"><a href="{{ route('plan') }}">Wedding Plan</a></li>
                        <li class="active"><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li class="active"><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

@yield('content')

<div class="footer">
    <!-- Footer -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 ft-aboutus">
                <h2>Wedding Orginizer</h2>
                <p>Please specify your wedding activities and then select the package that suits your wedding.</p>
                <a href="{{ route('plan') }}" class="btn btn-default">Select a Package</a> </div>
            <div class="col-md-3 ft-link">
                <h2>Useful links</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('plan') }}">Wedding Plan</a></li>
                    <li><a href="{{ url('gallery') }}">Gallery</a></li>
                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                    <li><a href="{{ url('login') }}">Login</a></li>
                </ul>
            </div>
            <div class="col-md-4 newsletter">
                <h2>Subscribe for Newsletter</h2>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter E-Mail Address" required>
                        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Submit</button>
            </span> </div>
                    <!-- /input-group -->
                    <!-- /.col-lg-6 -->
                </form>
                <div class="social-icon">
                    <h2>Be Social &amp; Stay Connected</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Footer -->
<div class="tiny-footer">
    <!-- Tiny footer -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">Copyright © {{ date('Y') }} Bali Klasik. All Rights Reserved</div>
        </div>
    </div>
</div>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<!-- /. Tiny Footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url('assets') }}/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('assets') }}/js/bootstrap.min.js"></script>
<!-- Flex Nav Script -->
<script src="{{ url('assets') }}/js/jquery.flexnav.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/js/navigation.js"></script>
<!-- sticky header -->
<script src="{{ url('assets') }}/js/jquery.sticky.js"></script>
<script src="{{ url('assets') }}/js/header-sticky.js"></script>

@stack('plugin_scripts')

@stack('scripts')


</body>
</html>
