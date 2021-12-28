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

    <!-- Font Awesome -->
    <link href="{{asset('gente/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('hud/css/vendor.min.css')}}" rel="stylesheet" />
    <link href="{{asset('hud/css/app.min.css')}}" rel="stylesheet" />


</head>


<body class='pace-top'>


    <div id="app" class="app app-full-height app-without-header">
        <div class="p-1 d-flex align-items-center">
            <a href="javascript:window.history.back();"
                class="btn btn-outline-default text-nowrap btn-sm px-3 rounded-pill"><i
                    class="fa fa-arrow-left me-1 ms-n1"></i> Back</a>
        </div>
        <div class="login">


            <div class="login-content">


                <form action="/login" method="POST">
                    {{ csrf_field() }}
                    <h1 class="text-center">Login SILPaKAMI</h1>
                    <div class="text-white text-opacity-50 text-center mb-4">
                        Silahkan masukan username dan password anda untuk masuk ke aplikasi
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissable fade show p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{session('error')}}</strong>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-white bg-opacity-5" required=""
                            name="nip" placeholder="NIP/NIK" />
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Password <span class="text-danger">*</span></label>

                        </div>
                        <input type="password" class="form-control form-control-lg bg-white bg-opacity-5" required=""
                            name="password" placeholder="Password" />
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck1" />
                            <label class="form-check-label" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3"
                        href="{{route('user')}}">Sign
                        In</button>
                    <br />

                    <div class="text-white text-center">
                        <h6>
                        <a href="{{asset('/file/bukuPanduanSilpa.pdf')}}"><i class="fas fa-download"></i> Unduh Buku
                            Panduan</a> 
                        </h6>
                    </div>

                </form>
            </div>

        </div>


        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>


    </div>

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
                            data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
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


    <script src="{{asset('hud/js/vendor.min.js')}}" type="d54254ccb1244a7d5db6decf-text/javascript"></script>
    <script src="{{asset('hud/js/app.min.js')}}" type="d54254ccb1244a7d5db6decf-text/javascript"></script>

    <script type="d54254ccb1244a7d5db6decf-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
    <script src="{{asset('hud/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="d54254ccb1244a7d5db6decf-|49" defer=""></script>
    <script defer src="{{asset('hud/static.cloudflareinsights.com/beacon.min.js')}}"
        data-cf-beacon='{"rayId":"6ac4f5899de24c9b","version":"2021.10.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}'></script>
</body>

</html>