@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'daftarTelegram'; ?>
@endsection

@section('content')
<div id="content" class="app-content">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-12">

                <div class="row">

                    <div class="col-xl-12">

                        @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                            <a href="{{route('telegrams')}}"> Lihat Daftar</a>
                        </div>
                        @endif

                        <h3>Tambah Data Telegram</h3>
                        <hr class="mb-4" />
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('telegram.update')}}" method="post" id="form-add">
                                    {{csrf_field()}}
                                    <input name="id" value="" type="hidden">
                                    <input name="redirect" value="telegram.addform" type="hidden">

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="mb-3">
                                                <label for="">Nama</label>
                                                <input type="text" value="{{old('name')}}" name="name"
                                                    class="form-control">
                                                @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nomor</label>
                                                <input type="text" name="number" value="{{old('number')}}"
                                                    class="form-control">
                                                @error('number')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Chat Id</label>
                                                <input type="text" name="chat_id" value="{{old('chat_id')}}"
                                                    class="form-control">
                                                @error('chat_id')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-inline">
                                                <button class="btn btn-primary"> Simpan </button>
                                                <a href="{{route('telegrams')}}" class="btn btn-default"> Kembali </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        </div>
    </div>
</div>
@endsection