<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('gente/images/logo_sumedang.png')}}" type="image/ico" />

  <title>SILPa | Login </title>

  <!-- Bootstrap -->
  <link href="{{asset('gente/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('gente/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('gente/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- Animate.css -->
  <link href="{{asset('gente/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('gente/build/css/custom.min.css')}}" rel="stylesheet">

  <style>
    .log {
      background-image: url({{url('file/assets/persandian.png')
    }
    }

    );
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    background-size:cover;
    }
  </style>
</head>

<body class="log">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    @if(session('error'))
    <div class="alert alert-danger text-center">
      {{session('error')}}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success text-center">
      {{session('success')}}
    </div>
    @endif
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="/login" method="POST">
            {{ csrf_field() }}
            <h1>Selamat Datang</h1>
            <div>
              <input type="text" class="form-control" placeholder="NIP" required="" name="nip" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
              <input type="submit" class="btn btn-default submit" href="{{route('user')}}" value="Log in">
              <input type="checkbox" name="remember_me"> Remember Me
            </div>

            <div class="clearfix"></div>


            <div class="separator"></div>
            <div>
              <h4><a href="{{asset('/file/bukuPanduanSilpa.pdf')}}"><i class="fa fa-cloud-download"></i> Unduh Buku
                  Panduan</a></h4>
            </div>
            <div class="separator"></div>
            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-flag"></i> SILPa KAMI</h1>
              <p>2020 SILPa KAMI Kabupaten Sumedang- Sistem Infromasi Layanan Persandian dan Keamanan Informasi</p>
            </div>
      </div>
      </form>
      </section>
    </div>

    <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form>
          <h1>Create Account</h1>
          <div>
            <input type="text" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <a class="btn btn-default submit" href="index.html">Submit</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
              <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
              <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
  </div>
</body>

</html>