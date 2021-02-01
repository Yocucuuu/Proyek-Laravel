<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link rel="stylesheet" href="css/colorpicker.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

    @if (Session::has("tembak"))
         <script>alert("Hayooo")</script>
    @endif

<!--Header-part-->
<div id="header">
    <h1><a href="/dashboard">Matrix Admin</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  {{-- di header --}}
  {{-- Look Profile n Edit File --}}
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-user"></i>Profile Admin</a></li>
          <li class="divider"></li>
          <li><a href="login.html"><i class="icon-key"></i> Edit File Admin</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <!--close-top-serch-->
  @if (Session::has("tembak"))
  <script>alert("Hayooo")</script>
@endif
  <!--sidebar-menu-->
  @yield('contentAdmin')
  @yield('contentGuru')
  @yield('contentSiswa')
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
  <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/homeAdmin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Welcome Admin</a></div>
    </div>
  <!--End-breadcrumbs-->



      <hr/>
  </div>
  <!--end-main-container-part-->

  <!--Footer-part-->
  <div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
  </div>
  <!--end-Footer-part-->

  <script src="js/excanvas.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.ui.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.flot.min.js"></script>
  <script src="js/jquery.flot.resize.min.js"></script>
  <script src="js/jquery.peity.min.js"></script>
  <script src="js/fullcalendar.min.js"></script>
  <script src="js/matrix.js"></script>
  <script src="js/matrix.dashboard.js"></script>
  <script src="js/jquery.gritter.min.js"></script>
  <script src="js/matrix.interface.js"></script>
  <script src="js/matrix.chat.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/matrix.form_validation.js"></script>
  <script src="js/jquery.wizard.js"></script>
  <script src="js/jquery.uniform.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/matrix.popover.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/matrix.tables.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.ui.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.toggle.buttons.js"></script>
  <script src="js/masked.js"></script>
  <script src="js/jquery.uniform.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/matrix.js"></script>
  <script src="js/matrix.form_common.js"></script>
  <script src="js/wysihtml5-0.3.0.js"></script>
  <script src="js/jquery.peity.min.js"></script>
  <script src="js/bootstrap-wysihtml5.js"></script>

  {{--  --}}


</body>
</html>
