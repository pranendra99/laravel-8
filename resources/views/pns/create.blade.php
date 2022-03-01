@extends('adminlte::page')

@section('title', 'Tambah Data PNS')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data PNS</h1>
@stop

@section('content')
    <form action="{{route('pns.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="InputNip">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="InputNip" 
                        placeholder="NIP" name="nip" value="{{old('nip')}}">
                        @error('nip') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputName">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="InputName" 
                        placeholder="Nama lengkap" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputTempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                        id="InputTempatLahir" placeholder="Tempat Lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                        @error('tempat_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputAlamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="InputAlamat" 
                        placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputTanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                        id="InputTanggalLahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="InputJK">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="InputJK" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputImage">Upload Foto</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="InputImage" 
                        placeholder="Foto" name="image" value="{{old('image')}}">
                        @error('image') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pns.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop