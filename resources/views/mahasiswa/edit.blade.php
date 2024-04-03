@extends('layouts.template')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="container py-5">
        <h1 class="mb-3">Edit Mahasiswa</h1>
        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                    value="{{ $mahasiswa->nim }}" id="nim" placeholder="123456">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ $mahasiswa->nama }}" id="nama" placeholder="Nama Mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $mahasiswa->email }}" id="email" placeholder="user@example.com">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">No HP</label>
                <input type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                    value="{{ $mahasiswa->nohp }}" id="email" placeholder="081234***">
                @error('nohp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan') is-invalid @enderror" aria-label="Default select example"
                    name="jurusan" value="{{ old('jurusan') }}">
                    <option selected disabled>Pilih jurusan</option>
                    <option name="jurusan" value="Rekayasa Perangkat Lunak {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                        Rekayasa Perangkat Lunak
                    </option>
                    <option name="jurusan" value="Informatika {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Informatika' ? 'selected' : '' }}>
                        Informatika
                    </option>
                    <option name="jurusan" value="Sains Data {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Sains Data' ? 'selected' : '' }}>
                        Sains Data
                    </option>
                    <option name="jurusan" value="Teknologi Informasi {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknologi Informasi' ? 'selected' : '' }}>
                        Teknologi Informasi
                    </option>
                    <option name="jurusan" value="Sistem Informasi {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>
                        Sistem Informasi
                    </option>
                    <option name="jurusan" value="Teknik Telekomunikasi {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                        Teknik Telekomunikasi
                    </option>
                    <option name="jurusan" value="Teknik Logistik {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknik Logistik' ? 'selected' : '' }}>
                        Teknik Logistik
                    </option>
                    <option name="jurusan" value="Teknik Industri {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknik Industri' ? 'selected' : '' }}>
                        Teknik Industri
                    </option>
                    <option name="jurusan" value="Teknik Elektro {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknik Elektro' ? 'selected' : '' }}>
                        Teknik Elektro
                    </option>
                    <option name="jurusan" value="Teknik Komputer {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Teknik Komputer' ? 'selected' : '' }}>
                        Teknik Komputer
                    </option>
                    <option name="jurusan" value="Bisnis Digital {{ old('jurusan') }}"
                        {{ $mahasiswa->jurusan == 'Bisnis Digital' ? 'selected' : '' }}>
                        Bisnis Digital
                    </option>
                </select>
                @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input class="form-control @error('foto') is-invalid @enderror" name="foto"
                    value="{{ asset('public/image/' . $mahasiswa->foto) }}" type="file" id="foto">
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
