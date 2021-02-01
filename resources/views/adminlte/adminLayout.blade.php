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


<!--Header-part-->
<div id="header">
    <h1><a href="/dashboard">Matrix Admin</a></h1>
  </div>
  <!--close-Header-part-->

@if (Session::has("tembak"))
<script>alert("Hayooo")</script>
@endif
  <!--top-Header-menu-->
  {{-- di header --}}
  {{-- Look Profile n Edit File --}}
  {{-- <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-user"></i>Profile Admin</a></li>
          <li class="divider"></li>
          <li><a href="login.html"><i class="icon-key"></i> Edit File Admin</a></li>
        </ul>
      </li>
    </ul>
  </div> --}}

  <!--close-top-serch-->
  <!--sidebar-menu-->
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li>
          <a href="/homeAdmin">
              <i class="icon icon-home"></i>
              <span>Dashboard</span></a>
      </li>
      <li>
          <a href="{{url("/pengumuman")}}">
              <i class="icon icon-bullhorn"></i>Pengumuman
          </a>
      </li>
      <li>
          <a href="{{url("/siswa")}}">
              <i class="icon icon-group"></i>
              <span>Siswa</span>
          </a>
      </li>
      <li>
           <a href="/guru">
              <i class="icon icon-user"></i>
              <span>Guru</span>
          </a>
      </li>
      <li>
          <a href="/AjarMengajar">
              <i class="icon icon-calendar"></i>
              <span>Ajar Mengajar</span>
          </a>
      </li>
      <li>
          <a href="/PeriodeAkademik">
              <i class="icon icon-user"></i>
              <span>Periode Akademik</span>
          </a>
      </li>
      <li>
          <a href="/kelas">
              <i class="icon icon-book"></i>
              <span>Kelas</span>
          </a>
      </li>

      <li>
          <a href="/MataPelajaran">
              <i class="icon icon-beaker"></i>
              <span>Mata Pelajaran</span>
          </a>
      </li>
      <li>
          <a href="/riwayat">
              <i class="icon icon-calendar"></i>
              <span>Riwayat akademik</span>
          </a>
      </li>
      <li>
          <a href="/naikKelas">
              <i class="icon icon-signout"></i>
              <span>Naik Kelas</span>
          </a>
      </li>
      <li>
        <a href="/PindahSiswaAktif">
            <i class="icon icon-signout"></i>
            <span>Siswa Aktif</span>
        </a>
    </li>
      <li>
          <a href="/logout">
              <i class="icon icon-signout"></i>
              <span>Log Out</span>
          </a>
      </li>
    </ul>
  </div>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
  <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/homeAdmin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Welcome Admin</a></div>
    </div>
  <!--End-breadcrumbs-->

        @yield('indexAdmin')
        @yield('formPengumuman')
        @yield('formSiswa')
        @yield('formGuru')
        @yield('formKelas')
        @yield('formMapel')
        @yield('formPeriodeAkademik')
        @yield('riwayat')
        @yield('jadwal')
        @yield('naikKelas')



        @yield('editSiswa')
        @yield('editGuru')
        @yield('editRiwayat')


      <hr/>
  </div>

  <!--end-main-container-part-->

  <!--Footer-part-->

  <div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a></div>
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

  {{--  --}}


</body>
</html>
