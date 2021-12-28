<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('gente/images/logo_sumedang.png')}}" type="image/ico" />

  <title>SILPa KAMI </title>

  <!-- core-css -->
  <link href="{{asset('hud/css/vendor.min.css')}}" rel="stylesheet" />
  <link href="{{asset('hud/css/app.min.css')}}" rel="stylesheet" />
  @yield('css')

  <style>
    a.floating-button {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        position: fixed;
        left: 50px;
        bottom: 50px;
        background-size: 60px 60px;
        background-image: url({{asset('hud/img/wa.png')}});
    }

    a.floating-button:hover {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        position: fixed;
        right: 50px;
        bottom: 50px;
        background-size: 60px 60px;
        background-image: url({{asset('hud/img/wa-hover.png')}});
    }
</style>

</head>

<body>
  <div id="app" class="app">

    <div id="header" class="app-header">

      <div class="desktop-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed"
          data-bs-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      </div>

      <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled"
          data-toggle-target=".app">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      </div>


      <div class="brand">
        <a href="#" class="brand-logo">
          <span class="brand-img">
            <span class="brand-img-text text-theme">S</span>
          </span>
          <span class="brand-text">SILPaKAMI || USER</span>
        </a>
      </div>


      <div class="menu">
        <div class="menu-item dropdown dropdown-mobile-full">
          <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
            <div class="menu-img online">
              <img src="{{asset('gente/images/logo_sumedang.png')}}" height="60px" />
            </div>
            <div class="menu-text d-sm-block d-none"><span>{{$name->nama}}</span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
            <form action="/logout" method="POST" id="logout_form">
              {{ csrf_field ()}}
            </form>
            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
              data-bs-target="#password">UBAH PASSWORD <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"
              style="padding-left: 5px;"></i></a></i></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center" href="#"
              onclick="document.getElementById('logout_form').submit()">LOGOUT <i
                class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
          </div>
        </div>
      </div>

    </div>

    @yield('menu')

    <?php 

    $dashboard = 'menu-item';

    $email = 'menu-item has-sub';
    $pembuatanEmail = 'menu-item';

    $sertifikat = 'menu-item has-sub';
    $pendaftaranSE = 'menu-item';
    $perubahanSE = 'menu-item';
    $pencabutanSE = 'menu-item';

    $layananJamming = 'menu-item has-sub';
    $permintaanLayanan = 'menu-item';

    $layananPentest = 'menu-item has-sub';
    $permintaanPentest = 'menu-item';

    $incidentHandling = 'menu-item has-sub';
    $insidenHandling = 'menu-item';

    if($item == 'dashboard'){
      $dashboard = 'menu-item active';
    }else if($item == 'pembuatanEmail'){
      $pembuatanEmail = 'menu-item active';
      $email = 'menu-item has-sub active';
    }else if($item == 'pendaftaranSE'){
      $pendaftaranSE = 'menu-item active';
      $sertifikat = 'menu-item has-sub active';
    }else if($item == 'perubahanSE'){
      $perubahanSE = 'menu-item active';
      $sertifikat = 'menu-item has-sub active';
    }else if($item == 'pencabutanSE'){
      $pencabutanSE = 'menu-item active';
      $sertifikat = 'menu-item has-sub active';
    }else if($item == 'permintaanLayanan'){
      $permintaanLayanan = 'menu-item active';
      $layananJamming = 'menu-item has-sub active';
    }else if($item == 'permintaanPentest'){
      $permintaanPentest = 'menu-item active';
      $layananPentest = 'menu-item has-sub active';
    }else if($item == 'insidenHandling'){
      $insidenHandling = 'menu-item active';
      $incidentHandling = 'menu-item has-sub active';
    }
    ?>

    <!-- sidebar menu -->
    <div id="sidebar" class="app-sidebar">
      <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
          <div class="menu-header">Navigation</div>
          <div class="{{$dashboard}}">
            <a href="/user" class="menu-link">
              <span class="menu-icon"><i class="bi bi-cpu"></i></span>
              <span class="menu-text">Dashboard</span>
            </a>
          </div>
          <div class="menu-header">Components</div>
          <div class="{{$email}}">
            <a href="#" class="menu-link">
              <span class="menu-icon">
                <i class="bi bi-envelope"></i>
              </span>
              <span class="menu-text">Email</span>
              <span class="menu-caret"><b class="caret"></b></span>
            </a>
            <div class="menu-submenu">
              <div class="{{$pembuatanEmail}}">
                <a href="{{route('pengajuanEmail')}}" class="menu-link">
                  <span class="menu-text">Pembuatan Email</span>
                </a>
              </div>
            </div>
          </div>
          <div class="{{$sertifikat}}">
            <a href="#" class="menu-link">
              <span class="menu-icon">
                <i class="bi bi-key"></i>
              </span>
              <span class="menu-text">Sertifikat Elektronik</span>
              <span class="menu-caret"><b class="caret"></b></span>
            </a>
            <div class="menu-submenu">
              <div class="{{$pendaftaranSE}}">
                <a href=" {{route('pengajuanSE')}}" class="menu-link">
                  <span class="menu-text">Pendaftaran</span>
                </a>
              </div>
              <div class="{{$perubahanSE}}">
                <a href=" {{route('perubahanSE')}}" class="menu-link">
                  <span class="menu-text">Perubahan</span>
                </a>
              </div>
              <div class="{{$pencabutanSE}}">
                <a href=" {{route('pencabutanSE')}}" class="menu-link">
                  <span class="menu-text">Pencabutan</span>
                </a>
              </div>
            </div>
          </div>
          <div class="{{$layananJamming}}">
            <a href="#" class="menu-link">
              <span class="menu-icon"><i class="bi bi-wifi"></i></span>
              <span class="menu-text">Layanan Jaming</span>
              <span class="menu-caret"><b class="caret"></b></span>
            </a>
            <div class="menu-submenu">
              <div class="{{$permintaanLayanan}}">
                <a href="{{route('layanan')}}" class="menu-link">
                  <span class="menu-text">Permintaan Layanan</span>
                </a>
              </div>
            </div>
          </div>
          <div class="{{$layananPentest}}">
            <a href="#" class="menu-link">
              <span class="menu-icon"><i class="bi bi-unlock"></i></span>
              <span class="menu-text">Layanan Pentest</span>
              <span class="menu-caret"><b class="caret"></b></span>
            </a>
            <div class="menu-submenu">
              <div class="{{$permintaanPentest}}">
                <a href="{{route('pengajuanPentest')}}" class="menu-link">
                  <span class="menu-text">Permintaan Pentest</span>
                </a>
              </div>
            </div>
          </div>
          <div class="{{$incidentHandling}}">
            <a href="#" class="menu-link">
              <span class="menu-icon"><i class="bi bi-shield"></i></span>
              <span class="menu-text">Incident Handling</span>
              <span class="menu-caret"><b class="caret"></b></span>
            </a>
            <div class="menu-submenu">
              <div class="{{$insidenHandling}}">
                <a href="{{route('insiden')}}" class="menu-link">
                  <span class="menu-text">Insiden Handling</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <a href="https://api.whatsapp.com/send?phone=6287720830197&text=Hallo%20Admin SILPaKAMI" target="_blank"
        class="floating-button"></a>
      </div>
    </div>
    <!-- /sidebar menu -->

    <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app"
      data-toggle-class="app-sidebar-mobile-toggled"></button>

    {{-- modal pasword --}}
    <div id="password" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="form-horizontal form-label-left" action="{{route('gantipassword')}}" method="POST">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Rubah Password</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
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
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- page content -->
    @if (count($errors) > 0)
    <div class="alert alert-danger fade in">
      <button type="button" class="close pull-right" data-bs-dismiss="alert" aria-label="Close">
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

    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

    <div class="app-theme-panel">
      <div class="app-theme-panel-container">
        <a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i
            class="bi bi-sliders"></i></a>
        <div class="app-theme-panel-content">

          <div class="app-theme-list">
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-pink"
                data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-red"
                data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-warning"
                data-theme-class="theme-warning" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-yellow"
                data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-lime"
                data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-green"
                data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
            <div class="app-theme-list-item active"><a href="javascript:;" class="app-theme-list-link bg-teal"
                data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-info"
                data-theme-class="theme-info" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-primary"
                data-theme-class="theme-primary" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-purple"
                data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-indigo"
                data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-gray-100"
                data-theme-class="theme-gray-200" data-toggle="theme-selector" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray">&nbsp;</a></div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- core-js -->
  <script src="{{asset('hud/js/vendor.min.js')}}"></script>
  <script src="{{asset('hud/js/app.min.js')}}"></script>

  @yield('script')
</body>

</html>