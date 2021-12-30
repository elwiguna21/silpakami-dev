@extends('layouts.layoutTeknisi')
@section('css')
<link href="{{asset('hud/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />
@endsection
@section('menu')
<?php $item = 'dashboard'; ?>
@endsection
@section('content')
<div id="content" class="app-content">
    <div class="bg-theme h-40px rounded text-black
     text-center mb-3 text-opacity-75" style="padding: 10px">
        <strong> Selamat Datang di SILPaKAMI | Sistem Informasi Layanan Persandian dan Keamanan Informasi </strong>
    </div>
    <div class="row">

        <!-- LAPORAN INSIDEN -->
        <div class="col-xl-12 col-lg-6">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex fw-bold small mb-3">
                        <span class="flex-grow-1">LAPORAN INSIDEN</span>
                        <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i
                                class="bi bi-fullscreen"></i></a>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-7">
                            <h3 class="mb-0">{{$insidenDay->jumlah}}</h3>
                        </div>
                        <div class="col-5">
                            <div class="mt-n2" data-render="apexchart" data-type="line" data-title="Visitors"
                                data-height="30">
                            </div>
                        </div>
                    </div>
                    <div class="small text-white text-opacity-50 text-truncate">
                        <i class="fa fa-chevron-up fa-fw me-1"></i> {{$insidenDay->jumlah}} Laporan Insiden Hari
                        ini<br />
                        <i class="far fa-user fa-fw me-1"></i> {{$insidenMonth->jumlah}} Laporan Insiden Bulan ini<br />
                        <i class="far fa-times-circle fa-fw me-1"></i> {{$insidenAll->jumlah}} Total Laporan Insiden
                    </div>
                </div>
                <div class="card-arrow">
                    <div class="card-arrow-top-left"></div>
                    <div class="card-arrow-top-right"></div>
                    <div class="card-arrow-bottom-left"></div>
                    <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('script')
<script src="{{asset('hud/plugins/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('hud/plugins/jvectormap-next/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('hud/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('hud/js/demo/dashboard.demo.js')}}"></script>
@endsection