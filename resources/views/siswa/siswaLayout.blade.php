<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} " />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-login.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
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
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Guru</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i>Profile Guru</a></li>
        </ul>
        </li>
    </ul>
    </div>

    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
        <ul>
          <li><a href="/dashboardSiswa"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
          <li> <a href="/biodata"><i class="icon icon-bullhorn"></i>Biodata</a></li>
          <li> <a href="/nilaiSiswa"><i class="icon icon-group"></i> <span>Nilai</span></a></li>
          <li> <a href="/jurusan"><i class="icon icon-user"></i> <span>Jurusan</span></a></li>
          <li><a href="/logout"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
        </ul>
      </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Welcome Admin</a></div>
        </div>


            @yield('lihatNilai')
            @yield('jurusan')
            @yield('editBiodata')
            @yield('biodata')
            @yield('dashboardSiswa')


    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->
    <div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
    </div>
    <!--end-Footer-part-->

    <script src="{{asset('js/excanvas.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.flot.min.js')}}"></script>
  <script src="{{asset('js/jquery.flot.resize.min.js')}}"></script>
  <script src="{{asset('js/jquery.peity.min.js')}}"></script>
  <script src="{{asset('js/fullcalendar.min.js')}}"></script>
  <script src="{{asset('js/matrix.js')}}"></script>
  <script src="{{asset('js/matrix.dashboard.js')}}"></script>
  <script src="{{asset('js/jquery.gritter.min.js        ')}}"></script>
  <script src="{{asset('js/matrix.interface.js          ')}}"></script>
  <script src="{{asset('js/matrix.chat.js               ')}}"></script>
  <script src="{{asset('js/jquery.validate.js           ')}}"></script>
  <script src="{{asset('js/matrix.form_validation.js    ')}}"></script>
  <script src="{{asset('js/jquery.wizard.js             ')}}"></script>
  <script src="{{asset('js/jquery.uniform.js            ')}}"></script>
  <script src="{{asset('js/select2.min.js               ')}}"></script>
  <script src="{{asset('js/matrix.popover.js            ')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js     ')}}"></script>
  <script src="{{asset('js/matrix.tables.js             ')}}"></script>
  <script src="{{asset('js/jquery.min.js                ')}}"></script>
  <script src="{{asset('js/jquery.ui.custom.js          ')}}"></script>
  <script src="{{asset('js/bootstrap.min.js             ')}}"></script>
  <script src="{{asset('js/bootstrap-colorpicker.js     ')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js      ')}}"></script>
  <script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
  <script src="{{asset('js/masked.js                    ')}}"></script>
  <script src="{{asset('js/jquery.uniform.js            ')}}"></script>
  <script src="{{asset('js/select2.min.js               ')}}"></script>
  <script src="{{asset('js/matrix.js                    ')}}"></script>
  <script src="{{asset('js/matrix.form_common.js        ')}}"></script>
  <script src="{{asset('js/wysihtml5-0.3.0.js           ')}}"></script>
  <script src="{{asset('js/jquery.peity.min.js          ')}}"></script>
  <script src="{{asset('js/bootstrap-wysihtml5.js       ')}}"></script>


</body>
</html>





