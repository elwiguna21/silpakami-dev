<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('gente/images/logo_sumedang.png')}}" type="image/ico" />

  <title>SILPa | Admin Page</title>

  <!-- Bootstrap -->
  <link href="{{asset ('gente/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset ('gente/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset ('gente/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{asset ('gente/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{asset ('gente/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
    rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset ('gente/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset ('gente/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset ('gente/build/css/custom.min.css')}}" rel="stylesheet">

  <!-- Datatables -->
  <link href="{{asset ('gente/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

  <!-- Dropzone.js -->
  <link href="{{asset ('gente/vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="{{asset ('gente//vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
    rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{asset ('gente/build/css/custom.min.css')}}" rel="stylesheet">

  <!-- Datatables -->
  <link href="{{asset ('gente/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
    rel="stylesheet">
  <link href="{{asset ('gente/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

  <!-- Dropzone.js -->
  <link href="{{asset ('gente/vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="{{asset ('gente//vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
    rel="stylesheet">
  <!--file input-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
    type="text/css" />

  <link href="{{asset('hud/css/vendor.min.css')}}" rel="stylesheet" />
  <link href="{{asset('hud/css/app.min.css')}}" rel="stylesheet" />
  <link href="{{asset('hud/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('user')}}" class="site_title"><i class="fas fa-lock"></i> <span>SILPa | Admin</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{asset('gente/images/logo_sumedang.png')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{$name->nama}}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu</h3>
              <ul class="nav side-menu">
                <li><a href="/admin"><i class="fas fa-home"></i> Dashboard</a>
                <li>
                <li><a><i class="fas fa-edit"></i> Sertifikat Elektornik <span class="fas fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('adminpembuatan')}}">Pendaftaran</a></li>
                    <li><a href="{{route('adminperubahan')}}">Perubahan</a></li>
                    <li><a href="{{route('adminpencabutan')}}">Pencabutan</a></li>
                    <li><a href="{{route('adminp12')}}">Data P12</a></li>
                  </ul>
                </li>
                <li><a><i class="fas fa-signal"></i> Layanan Jaming <span class="fas fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('adminlayanan')}}">Permintaan Layanan</a></li>
                  </ul>
                </li>
                <li><a><i class="fas fa-umbrella"></i> Incident Handling <span class="fas fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('adminincident')}}">Insiden Handling</a></li>
                    {{-- <li><a href="{{route('adminlaporan')}}">Laporan Insiden</a></li> --}}
                  </ul>
                </li>
                <li><a><i class="fas fa-edit"></i> Data Master <span class="fas fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('jabatan')}}">Jabatan</a></li>
                    <li><a href="{{route('golongan')}}">Golongan</a></li>
                    <li><a href="{{route('unitKerja')}}">Unit kerja</a></li>
                  </ul>
                </li>
                <li><a><i class="fas fa-globe"></i> Monitoring Website <span class="fas fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('sites')}}">Daftar Website</a></li>
                    <li><a href="{{route('telegrams')}}">Daftar Telegram</a></li>
                    <li><a href="{{route('telegram.config.page')}}">Konfigurasi Telegram</a></li>
                    <li><a href="{{route('site.logs')}}">Log Laporan</a></li>
                  </ul>
                </li>
                <li><a href="{{route('register')}}"><i class="fas fa-user"></i> Akun</a>
                <li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fas fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{asset('gente/images/logo_sumedang.png')}}" alt="">{{$name->nama}}
                  <span class=" fas fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <form action="/logout" method="POST" id="logout_form">
                    {{ csrf_field ()}}
                  </form>
                  
                  <li><a href="#" data-toggle="modal" data-target="#password"><i class="fas fa-key pull-right"></i>
                      Change Password</a></li>
                  <li><a href="#" onclick="document.getElementById('logout_form').submit()"><i
                        class="fas fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      {{-- modal pasword --}}
      <div id="password" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Rubah Password</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal form-label-left" action="{{route('gantipassword')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-3" for="last-name">Masukan Password Baru <span
                      class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="password" id="pass" name="password" required="required"
                      class="form-control col-md-7 col-xs-12">
                    <input type="hidden" id="id" name="id" required="required" class="form-control col-md-7 col-xs-12"
                      value="{{$name->id}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3" for="last-name">Ulangi Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7">
                    <input type="password" id="pass2" name="password2" required="required"
                      class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Rubah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- page content -->
      @if (count($errors) > 0)
      <div class="alert alert-danger fade in">
        <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p>Perhatian!</p>
        <ul>
          @foreach ($errors->all() as $error)
          <li class="text-center">{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @yield('content')
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          ©2020 SILPa KAMI - Sistem Infromasi Layanan Persandian dan Keamanan Informasi
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset ('gente/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset ('gente/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset ('gente/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset ('gente/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset ('gente/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset ('gente/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset ('gente/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset ('gente/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset ('gente/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset ('gente/vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset ('gente/vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset ('gente/vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset ('gente/vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset ('gente/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset ('gente/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset ('gente/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset ('gente/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset ('gente/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset ('gente/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset ('gente/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset ('gente/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset ('gente/vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset ('gente/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset ('gente/build/js/custom.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript"></script>
  @yield('script')
</body>

</html>