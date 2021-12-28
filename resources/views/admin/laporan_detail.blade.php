@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'insidenHandling'; ?>
@endsection

@section('content')

<div id="content" class="app-content">
  <div class="p-3 d-flex align-items-center">
    <a href="javascript:window.history.back();" class="btn btn-outline-default text-nowrap btn-sm px-3 rounded-pill"><i
        class="fa fa-arrow-left me-1 ms-n1"></i> Back</a>
  </div>
  <div class="row">

    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="card-body">
          <h2>Detail <small>Insiden Handling</small></h2>
          <hr />
          <div class="row">
            <div class="col-md-8 right-margin">
              <div class="form-group mb-3">

                <label>Nama</label>
                <input type="email" class="form-control" value="{{$incident->nama}}" readonly>
              </div>
              <div class="form-group mb-3">

                <label>Perangkat Daerah</label>
                <input type="text" class="form-control" value="{{$incident->nama_ins}}" readonly>
              </div>
              <div class="form-group mb-3">

                <label>Keterangan Insiden</label>
                <textarea class="form-control" readonly> {{$incident->ket_pelapor}}</textarea>
              </div>
            </div>
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

    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="card-body">
          <h2>Screenshoot <small> atau photo </small></h2>
          <hr />
          <div class="row">
            @php
            $index = 0;
            @endphp
            @foreach ($images as $image)
            @php
            $index = $index + 1;
            @endphp
            <div class="col-md-55">
              <a href="{{ $image->path }}" target="_blank">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 20%; display: block;" src="{{ $image->path }}" alt="image" />
                  </div>
                </div>
              </a>
            </div>
            @endforeach
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


    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="card-body pb-2">
          <h2>Laporan <small>Detail Insiden Handling</small></h2>
          <hr />
          <div class="row">
            <div class="col-xl-6">
              <div class="form-group mb-3">
                <label>Jenis Insiden</label>
                <input type="email" name="jenis_insiden" class="form-control" value="{{$incident->jenis_insiden}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Cakupan Insiden</label>
                <input type="email" name="jenis_insiden" class="form-control" value="{{$incident->cakupan_insiden}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Jumlah Sistem Yang Terkena Dampak</label>
                <input type="email" name="	jumlah_sistem" class="form-control" value="{{$incident->jumlah_sistem}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Jumlah Pengguna Yang Terkena Dampak</label>
                <input type="email" name="jumlah_pengguna" class="form-control" value="{{$incident->jumlah_pengguna}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Pihak Ketiga Yang Terkena Dampak</label>
                <input type="email" name="pihak_ketiga" class="form-control" value="{{$incident->pihak_ketiga}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Dampak Insiden</label>
                <textarea class="form-control" name="dampak_insiden" readonly> {{$incident->dampak_insiden}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Sensitivitas Informasi</label>
                <textarea class="form-control" name="sensitivita_informasi"
                  readonly> {{$incident->sensitivita_informasi}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Data Dienkripsi </label>
                <input type="email" name="pihak_ketiga" class="form-control" value="{{$incident->data_enkripsi}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Besar Data Terkena Dampak</label>
                <textarea class="form-control" nama="besar_data" readonly> {{$incident->besar_data}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Sumber Serangan</label>
                <input type="email" name="sumber_serangan" class="form-control" value="{{$incident->sumber_serangan}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Tujuan Serangan </label>
                <input type="email" name="tujuan_serangan" class="form-control" value="{{$incident->tujuan_serangan}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Alamat IP Sistem</label>
                <input type="email" name="ip_sistem" class="form-control" value="{{$incident->ip_sistem}}" readonly>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group mb-3">
                <label>Nama Domain Sistem</label>
                <input type="email" name="domain_sistem" class="form-control" value="{{$incident->domain_sistem}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Fungsi Dari Sistem (webserver)</label>
                <input type="email" name="fungsi" class="form-control" value="{{$incident->fungsi}}" readonly>
              </div>
              <div class="form-group mb-3">
                <label>Sistem Operasi</label>
                <input type="email" name="so" class="form-control" value="{{$incident->so}}" readonly>
              </div>
              <div class="form-group mb-3">
                <label>Level Patching</label>
                <input type="email" name="patching_level" class="form-control" value="{{$incident->patching_level}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Perangkat Lunak Sekuriti</label>
                <input type="email" name="security_sistem" class="form-control" value="{{$incident->security_sistem}}"
                  readonly>
              </div>
              <div class="form-group mb-3">
                <label>Lokasi Fisik</label>
                <input type="email" name="lokasi" class="form-control" value="{{$incident->lokasi}}" readonly>
              </div>
              <div class="form-group mb-3">
                <label>Level Hak Akses Pengguna</label>
                <textarea name="level_hak_akses" class="form-control"
                  readonly> {{$incident->level_hak_akses}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Tindakan Identifikasi</label>
                <textarea class="form-control" name="tindakan_identifikasi"
                  readonly> {{$incident->tindakan_identifikasi}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Tindakan Pemulihan Insiden</label>
                <textarea name="tindakan_identifikasi" class="form-control"
                  readonly> {{$incident->tindakan_pemulihan}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Tindakan Pencegahan</label>
                <textarea name="tindakan_pemulihan" class="form-control"
                  readonly> {{$incident->tindakan_pencegahan}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label>Tanggal Ditangani</label>
                <input type="email" name="lokasi" class="form-control" value="{{$incident->tgl_ditangani}}" readonly>
              </div>
            </div>
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