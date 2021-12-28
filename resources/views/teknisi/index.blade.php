@extends('layouts.layoutTeknisi')
@section('content')
<div class="right_col" role="main">
	<!-- top tiles -->
	{{-- <div class="row tile_count">
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Pembuatan SE</span>
			<div class="count">{{$pengajuan->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Hari ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-clock-o"></i> Perubahan SE</span>
			<div class="count">{{$perubahan->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Hari Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Pencabutan SE</span>
			<div class="count green">{{$pencabutan->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Hari Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Permintaan Jamming</span>
			<div class="count">{{$jamming->jumlah}}</div>
			<span class="count_bottom"><i class="green"></i> Hari Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Laporan Insiden</span>
			<div class="count">{{$insiden->jumlah}}</div>
			<span class="count_bottom"><i class="green"></i> Hari Ini</span>
		</div>
	</div> --}}
	
	{{-- <!-- top tiles2 -->
	<div class="row tile_count">
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Pembuatan SE</span>
			<div class="count">{{$pengajuanb->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Bulan ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-clock-o"></i> Perubahan SE</span>
			<div class="count">{{$perubahanb->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Bulan Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Pencabutan SE</span>
			<div class="count green">{{$pencabutanb->jumlah}}</div>
			<span class="count_bottom"><i class="green"> </i> Bulan Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Permintaan Jamming</span>
			<div class="count">{{$jammingb->jumlah}}</div>
			<span class="count_bottom"><i class="green"></i> Bulan Ini</span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Laporan Insiden</span>
			<div class="count">{{$insidenb->jumlah}}</div>
			<span class="count_bottom"><i class="green"></i> Bulan Ini</span>
		</div>
	</div> --}}
	<!-- /top tiles -->  
	<img src="/file/assets/persandian.png" width="100%" > 
</div>

@endsection