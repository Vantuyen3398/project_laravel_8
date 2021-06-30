<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset("/backend/images/favicon.ico")}}" type="image/ico" />

    <title>Gentelella Alela!  </title>

    <!-- Bootstrap -->
    <link href="{{asset("/backend/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("/backend/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset("/backend/css/nprogress.css")}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset("/backend/css/green.css")}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset("/backend/css/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset("/backend/css/jqvmap.min.css")}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset("/backend/css/daterangepicker.css")}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset("/backend/css/custom.min.css")}}" rel="stylesheet">
    <link href="{{asset("/backend/css/form.css")}}" rel="stylesheet">
    <link href="{{asset("/backend/css/table.css")}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('backend/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                  @if(session())
                    {{session()->get('name')}}
                  @endif
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('user.create')}}">Add User</a></li>
                      <li><a href="{{route('user.list')}}">List User</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-trademark"></i> Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('cat.create')}}">Add Cat</a></li>
                      <li><a href="{{route('cat.list')}}">List Cat</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-product"></i> Product <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('pd.create')}}">Add Product</a></li>
                      <li><a href="{{route('pd.list')}}">List Product</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('/backend/images/img.jpg')}}" alt="">
                    @if(session())
                        {{session()->get('name')}}
                    @endif
                    
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <section class="admin_content">
          @yield('admin_content')
          </section>
          <!-- /top tiles -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Van Tuyen</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset("/backend/js/jquery.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset("/backend/js/bootstrap.bundle.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{asset("/backend/js/fastclick.js")}}"></script>
    <!-- NProgress -->
    <script src="{{asset("/backend/js/nprogress.js")}}"></script>
    <!-- Chart.js -->
    <script src="{{asset("/backend/js/Chart.min.js")}}"></script>
    <!-- gauge.js -->
    <script src="{{asset("/backend/js/gauge.min.js")}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset("/backend/js/bootstrap-progressbar.min.js")}}"></script>
    <!-- iCheck -->
    <script src="{{asset("/backend/js/icheck.min.js")}}"></script>
    <!-- Skycons -->
    <script src="{{asset("/backend/js/skycons.js")}}"></script>
    <!-- Flot -->
    <script src="{{asset("/backend/js/jquery.flot.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.flot.pie.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.flot.time.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.flot.stack.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.flot.resize.js")}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset("/backend/js/jquery.flot.orderBars.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.flot.spline.min.js")}}"></script>
    <script src="{{asset("/backend/js/curvedLines.js")}}"></script>
    <!-- DateJS -->
    <script src="{{asset("/backend/js/date.js")}}"></script>
    <!-- JQVMap -->
    <script src="{{asset("/backend/js/jquery.vmap.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.vmap.world.js")}}"></script>
    <script src="{{asset("/backend/js/jquery.vmap.sampledata.js")}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset("/backend/js/moment.min.js")}}"></script>
    <script src="{{asset("/backend/js/daterangepicker.js")}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset("/backend/js/custom.min.js")}}"></script>

</body>
</html>


