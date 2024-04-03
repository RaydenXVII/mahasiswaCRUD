@extends('layouts.template')
@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="container py-5">
        <h1 class="mb-3">Tambah Mahasiswa</h1>
        <form action="/mahasiswa" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                    value="{{ old('nim') }}" id="nim" placeholder="123456">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama') }}" id="nama" placeholder="Nama Mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" id="email" placeholder="user@example.com">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">No HP</label>
                <input type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                    value="{{ old('nohp') }}" id="email" placeholder="081234***">
                @error('nohp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan') is-invalid @enderror" aria-label="Default select example"
                    name="jurusan">
                    <option selected disabled>Pilih jurusan</option>
                    <option name="jurusan" value="Rekayasa Perangkat Lunak {{ old('jurusan') }}">Rekayasa Perangkat Lunak
                    </option>
                    <option name="jurusan" value="Informatika {{ old('jurusan') }}">Informatika</option>
                    <option name="jurusan" value="Sains Data {{ old('jurusan') }}">Sains Data</option>
                    <option name="jurusan" value="Teknologi Informasi {{ old('jurusan') }}">Teknologi Informasi</option>
                    <option name="jurusan" value="Sistem Informasi {{ old('jurusan') }}">Sistem Informasi</option>
                    <option name="jurusan" value="Teknik Telekomunikasi {{ old('jurusan') }}">Teknik Telekomunikasi</option>
                    <option name="jurusan" value="Teknik Logistik {{ old('jurusan') }}">Teknik Logistik</option>
                    <option name="jurusan" value="Teknik Industri {{ old('jurusan') }}">Teknik Industri</option>
                    <option name="jurusan" value="Teknik Elektro {{ old('jurusan') }}">Teknik Elektro</option>
                    <option name="jurusan" value="Teknik Komputer {{ old('jurusan') }}">Teknik Komputer</option>
                    <option name="jurusan" value="Bisnis Digital {{ old('jurusan') }}">Bisnis Digital</option>
                </select>
                @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}"
                    type="file" id="foto">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
        </form>
    </div>
@endsection
