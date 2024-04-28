@extends('layouts.template')
@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1 class="mb-3, text-center">Tambah Mahasiswa</h1>
    <div class="container py-5">
        <form action="/mahasiswa" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                    value="{{ old('nim') }}" id="nim" placeholder="1201220000 (Max 10)"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama') }}" id="nama" placeholder="John Doe">
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
                    value="{{ old('nohp') }}" id="email" placeholder="088123456789 (Max 12)"
                    oninput="if(this.value.length > 12) this.value = this.value.slice(0, 12);">
                @error('nohp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select class="form-select @error('prodi') is-invalid @enderror" aria-label="Default select example"
                    name="prodi">
                    <option selected disabled>Pilih prodi</option>
                    <option name="prodi" value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option name="prodi" value="Informatika">Informatika</option>
                    <option name="prodi" value="Sains Data">Sains Data</option>
                    <option name="prodi" value="Teknologi Informasi">Teknologi Informasi</option>
                    <option name="prodi" value="Sistem Informasi">Sistem Informasi</option>
                    <option name="prodi" value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                    <option name="prodi" value="Teknik Logistik">Teknik Logistik</option>
                    <option name="prodi" value="Teknik Industri">Teknik Industri</option>
                    <option name="prodi" value="Teknik Elektro">Teknik Elektro</option>
                    <option name="prodi" value="Teknik Komputer">Teknik Komputer</option>
                    <option name="prodi" value="Bisnis Digital">Bisnis Digital</option>
                </select>
                @error('prodi')
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
            <a href="/mahasiswa" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
