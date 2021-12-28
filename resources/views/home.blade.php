<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('gente/images/logo_sumedang.png')}}" type="image/ico" />

    <title>SILPa | HOME</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('home/css/vendor.min.css')}}" rel="stylesheet" />
    <link href="{{asset('home/css/app.min.css')}}" rel="stylesheet" />

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

<body data-bs-spy='scroll' data-bs-target='#header' data-bs-offset='51'>

    <div id="page-container" class="fade">

        <div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">

            <div class="container">

                <a href="#" class="navbar-brand">
                    <img src="{{asset('home/image/bg/logo silpakami 4.png')}}" />
                    <span class="brand-text">
                        <span class="text-primary"> SILPaKAMI</span> Kab. Sumedang
                    </span>
                </a>


                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                    data-bs-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-end">
                        <li class="nav-item"><a class="nav-link active" href="#home"
                                data-click="scroll-to-target">HOME</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">ABOUT</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#team" data-click="scroll-to-target">TEAM</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#service"
                                data-click="scroll-to-target">LAYANAN</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#work" data-click="scroll-to-target">WORK</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#contact"
                                data-click="scroll-to-target">KONTAK</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" data-click="scroll-to-target"></a>
                        </li>
                    </ul>

                    <a class="btn btn-primary" href="{{route('login')}}">LOGIN</a>

                </div>

            </div>

        </div>


        <div id="home" class="content has-bg home">
            <div class="content-bg" style="background-image: url({{asset('home/image/bg/bg-persandian-bw2.jpg')}});"
                data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.25">
            </div>


            <div class="container home-content">
                <h1>Selamat Datang di SILPaKAMI</h1>
                <h3 style="color: #00acac;">Sistem Informasi Layanan Persandian dan Keamanan Informasi</h3>
                <h3>Kabupaten Sumedang</h3>
                <p>
                    Sistem Informasi Layanan Persandian dan Keamanan Informasi “SILPaKAMI”
                    merupakan suatu Aplikasi layanan persandian dan keamanan informasi yang dimiliki
                    oleh Bidang Persandian pada Dinas Komunikasi, Informatika, Persandian dan Statistik Kab.
                    Sumedang.<br />
                </p>

            </div>

        </div>


        <div id="about" class="content" data-scrollview="true">

            <div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
                <h2 class="content-title">About Us</h2>
                <br/>
                <br/>

                <div class="row">

                    <div class="col-lg-4">

                        <div class="about">
                            <h3 class="mb-3">Tentang Aplikasi</h3>
                            <p>
                                SILPaKAMI (Sistem Informasi Layanan Persandian dan Keamanan Infomasi) merupakan suatu
                                aplikasi yang dipergunakan
                                untuk membantu Bidang Persandian pada Diskominfosanditik Kabupaten Sumedang dalam
                                mengelola, memberikan layanan persandian dan
                                keamanan informasi bagi Perangkat Daerah Di Lingkungan Pemerintah Kabupaten Sumedang.
                            </p>
                            <p>
                                SILPaKAMI merupakan suatu layanan penerapan sertifikat elektronik yang meliputi
                                (Pendaftaran Sertifikat
                                Elektronik,Perubahan data Sertifikat Elektronik, Pencabutan Sertifikat Elektronik),
                                Layanan Pembuatan Email Dinas, Layanan Jamming (layanan jamming bagi rapat dinas
                                pimpinan dan
                                rapat dinas perangkat daerah), Layanan Penetration Testing (Pentest) dan Layanan Insiden
                                Handling
                                Keamanan Informasi.
                            </p>
                        </div>

                    </div>


                    <div class="col-lg-4">
                        <h3 class="mb-3">Filosofi</h3>

                        <div class="about-author">
                            <div class="quote">
                                <i class="fa fa-quote-left"></i>
                                <h3>Data anda adalah keamanan anda,<br /><span>kami siap mengamankan</span></h3>
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="author">
                                <div class="image">
                                    <img src="{{asset('home/image/user/pa mamat 2.jpg')}}" alt="Sean Ngu" />
                                </div>
                                <div class="info">
                                    Mamat Rohimat
                                    <small>Kepala Bidang Persandian</small>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-4">
                        <h3 class="mb-3">Pengalaman</h3>

                        <div class="skills">
                            <div class="skills-name">Email</div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-theme"
                                    style="width: 95%">
                                    <span class="progress-number">95%</span>
                                </div>
                            </div>
                            <div class="skills-name">Sertifikat Elektronik</div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-theme"
                                    style="width: 95%">
                                    <span class="progress-number">95%</span>
                                </div>
                            </div>
                            <div class="skills-name">Jamming</div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-theme"
                                    style="width: 70%">
                                    <span class="progress-number">70%</span>
                                </div>
                            </div>
                            <div class="skills-name">Pentest</div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-theme"
                                    style="width: 70%">
                                    <span class="progress-number">70%</span>
                                </div>
                            </div>
                            <div class="skills-name">Incident Handling</div>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-theme"
                                    style="width: 80%">
                                    <span class="progress-number">80%</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">

            <div class="content-bg" style="background-image: url({{asset('home/image/bg/bg-milestone.jpg')}});"
                data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-md="0.01"
                data-paroller-factor-xs="0.01"></div>


            <!-- <div class="container">

                <div class="row">

                    <div class="col-lg-4 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="1998">1,998</div>
                            <div class="title">Pengguna Email Dinas</div>
                        </div>
                    </div>

                    <div class="col-lg-4 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="1313">1,313</div>
                            <div class="title">Sertifikat Elektronik</div>
                        </div>
                    </div>


                    <div class="col-lg-4 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="56">56</div>
                            <div class="title">Registered Akun SILPaKAMI</div>
                        </div>
                    </div>



                </div>

            </div> -->

        </div>


        <div id="team" class="content" data-scrollview="true">

            <div class="container">
                <h2 class="content-title">Tim Bidang Persandian</h2>

                <div class="row mb-5">
                    <div class="col-lg-12 text-center">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/pa mamat 2.jpg')}}" alt="Ryan Teller" />
                            </div>
                            <div class="info">
                                <h3 class="name">Mamat Rohimat</h3>
                                <div class="title text-primary">KEPALA BIDANG PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mb-5">


                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/agus ramdan.jpg')}}" alt="Jonny Cash" />
                            </div>
                            <div class="info">
                                <h3 class="name">Agus Ramdan S.</h3>
                                <div class="title text-primary">KEPALA SEKSI TATA KELOLA PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/user.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Haris Iskandar</h3>
                                <div class="title text-primary">KEPALA SEKSI OPERASIONAL PENGAMANAN PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/wine.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Wine R Sukmadewi</h3>
                                <div class="title text-primary">PENGADMINISTRASI UMUM</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">

                   

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/hendri.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Hendri Wiguna</h3>
                                <div class="title text-primary">PRANATA KOMPUTER</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/alfan.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Alfan Fathurohman</h3>
                                <div class="title text-primary">ANALIS DIGITAL FORENSIK</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/user.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Roza Hidayat</h3>
                                <div class="title text-primary">PRANATA KOMPUTER</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row mb-5">

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/user.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Herry Rohaeli</h3>
                                <div class="title text-primary">PELAKSANA BIDANG PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/user.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Wawan</h3>
                                <div class="title text-primary">PELAKSANA BIDANG PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="team">
                            <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                                <img src="{{asset('home/image/user/user.jpg')}}" alt="Mia Donovan" />
                            </div>
                            <div class="info">
                                <h3 class="name">Yeri Siti Jamilah</h3>
                                <div class="title text-primary">PELAKSANA BIDANG PERSANDIAN</div>
                                <div class="social">
                                    <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>


        <div id="quote" class="content bg-black-darker has-bg" data-scrollview="true">

            <div class="content-bg" style="background-image: url({{asset('home/image/bg/bg-quote.jpg')}});"
                data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
            </div>


            <div class="container" data-animation="true" data-animation-type="animate__fadeInLeft">

                <div class="row">

                    <div class="col-lg-12 quote">
                        <i class="fa fa-quote-left"></i> "No System Is Safe"
                        <i class="fa fa-quote-right"></i>
                    </div>

                </div>

            </div>

        </div>


        <div id="service" class="content" data-scrollview="true">

            <div class="container">
                <h2 class="content-title">Layanan Kami</h2>
                <p class="content-desc">
                    Terdapat 5 jenis pelayanan yang ada di aplikasi SILPaKAMI diantaranya sebagai berikut.
                    </p>
                    <br />

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="service">
                            <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i
                                    class="fa fa-envelope"></i></div>
                            <div class="info">
                                <h4 class="title">Pembuatan Email Dinas</h4>
                                <p class="desc">Pelayanan pembuatan email dinas @sumedangkab.go.id untuk para ASN dan
                                    Perangkat Desa di kabupaten Sumedang.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="service">
                            <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i
                                    class="fa fa-key"></i></div>
                            <div class="info">
                                <h4 class="title">Sertifikat Elektronik (TTE)</h4>
                                <p class="desc">Pelayanan Sertifikat Elektronik meliputi pendaftaran, pencabutan dan
                                    perubahan data Sertifikat elektronik bagi para ASN dan Perangkat Desa di Kabupaten
                                    Sumedang.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="service">
                            <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i
                                    class="fa fa-signal"></i></div>
                            <div class="info">
                                <h4 class="title">Layanan Jamming</h4>
                                <p class="desc">Layanan Jamming (layanan pemutus sinyal ponsel untuk keamanan) bagi
                                    rapat dinas pimpinan dan rapat dinas perangkat daerah.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="service">
                            <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i
                                    class="fa fa-shield-virus"></i></div>
                            <div class="info">
                                <h4 class="title">Incident Handling</h4>
                                <p class="desc">Layanan pelaporan bagi SKPD bila terjadi serangan cyber dan gangguan
                                    keamanan informasi lainnya.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="service">
                            <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i
                                    class="fa fa-lock-open"></i></div>
                            <div class="info">
                                <h4 class="title">Penetration Testing</h4>
                                <p class="desc">Layanan Penetration testing untuk pengujian kerentanan keamanan aplikasi
                                    bagi SKPD yang memiliki aplikasi.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <div id="action-box" class="content has-bg" data-scrollview="true">

            <div class="content-bg" style="background-image: url({{asset('home/image/bg/bg-action.jpg')}});"
                data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
            </div>


            <div class="container" data-animation="true" data-animation-type="animate__fadeInRight">

                <!-- <div class="row action-box">

                    <div class="col-lg-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="1998">1,998</div>
                            <div class="title">Pengguna Email Dinas</div>
                        </div>
                    </div>

                    <div class="col-lg-2 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="1313">1,313</div>
                            <div class="title">Sertifikat Elektronik</div>
                        </div>
                    </div>


                    <div class="col-lg-2 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="0">0</div>
                            <div class="title">Layanan Pentest</div>
                        </div>
                    </div>


                    <div class="col-lg-2 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="0">0</div>
                            <div class="title">Layanan Jamming</div>
                        </div>
                    </div>

                    <div class="col-lg-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number"
                                data-final-number="4">4</div>
                            <div class="title">Incident Handling</div>
                        </div>
                    </div>


                </div> -->

            </div>

        </div>


        <!-- <div id="work" class="content" data-scrollview="true">

            <div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
                <h2 class="content-title">Our Latest Work</h2>
                <p class="content-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
                    sed bibendum turpis luctus eget
                </p>

                <div class="row row-space-10">

                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-1.jpg')}}" alt="Work 1" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Aliquam molestie</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-2.jpg')}}" alt="Work 2" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Quisque at pulvinar lacus</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-3.jpg')}}" alt="Work 3" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Vestibulum et erat ornare</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-4.jpg')}}" alt="Work 4" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Sed vitae mollis magna</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-5.jpg')}}" alt="Work 5" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Suspendisse at mattis odio</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-6.jpg')}}" alt="Work 6" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Aliquam vitae commodo diam</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-7.jpg')}}" alt="Work 7" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Phasellus eu vehicula lorem</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-3 col-md-4">

                        <div class="work">
                            <div class="image">
                                <a href="#"><img src="{{asset('home/image/work/work-img-8.jpg')}}" alt="Work 8" /></a>
                            </div>
                            <div class="desc">
                                <span class="desc-title">Morbi bibendum pellentesque</span>
                                <span class="desc-text">Lorem ipsum dolor sit amet</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div> -->

        <div id="contact" class="content bg-silver-lighter" data-scrollview="true">

            <div class="container">
                <h2 class="content-title">Kontak Kami</h2>
                <br/>
                <div class="row">

                    <div class="col-lg-12 text-center">
                        
                        <p>
                            Jika anda mengalami kendala terkait penggunaan aplikasi SILPaKAMI ataupun kendala terkait
                            penggunaan email, sertifikat elektronik dan kendala lainnya terkait keamanan informasi,
                            silahkan hubungi kami atau bisa langsung datang ke kantor kami.
                        </p>
                        <br/>

                        <p>
                            <strong>Kantor Dinas Komunikasi, Informatika, Persandian dan Statistik Kab.
                                Sumedang</strong><br />
                            Lt. 2 Bidang Persandian<br />
                            Jl. Angkrek No. 103 Sumedang<br />
                            Telp: (0261) 201225<br /> <br />
                            Jadwal Pelayanan : <br />
                            Senin s/d Jumat jam 08.00 s/d 15.00 <br />


                        </p>

                    </div>


                    <!-- <div class="col-lg-6 form-col" data-animation="true" data-animation-type="animate__fadeInRight">
                        <form class="form-horizontal">
                            <div class="row mb-3">
                                <label class="col-form-label col-lg-3 text-lg-right">Name <span
                                        class="text-primary">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-lg-3 text-lg-right">Email <span
                                        class="text-primary">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-lg-3 text-lg-right">Message <span
                                        class="text-primary">*</span></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-lg-3 text-lg-right"></label>
                                <div class="col-lg-9 text-left">
                                    <button type="submit" class="btn btn-theme btn-primary btn-block">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div> -->

                </div>
                <a href="https://api.whatsapp.com/send?phone=6287720830197&text=Hallo%20Admin SILPaKAMI" target="_blank"
                    class="floating-button"></a>

            </div>

        </div>


        <div id="footer" class="footer">
            <div class="container">
                <div class="footer-brand">
                  <img src="{{asset('home/image/bg/logo silpakami 4.png')}}" style="width: 45px;" />
                    SILPaKAMI
                </div>
                <p>
                    &copy; Copyright Bidang Persandian, Diskominfosanditik Kab. Sumedang 2021 <br />
                    version 2.0
                </p>

            </div>
        </div>


    </div>

    <script src="{{asset('home/js/vendor.min.js')}}"></script>
    <script src="{{asset('home/js/app.min.js')}}"></script>


</body>

</html>