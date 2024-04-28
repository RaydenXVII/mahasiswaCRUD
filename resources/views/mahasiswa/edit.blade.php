@extends('layouts.template')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1 class="mb-3, text-center">Edit Mahasiswa</h1>
    <div class="container py-5">
        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                    value="{{ $mahasiswa->nim }}" id="nim" placeholder="1201220000 (Max 10)">
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ $mahasiswa->nama }}" id="nama">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $mahasiswa->email }}" id="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">No HP</label>
                <input type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                    value="{{ $mahasiswa->nohp }}" id="email" placeholder="088123456789 (Max 12)">
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
                    <option name="prodi" value="Rekayasa Perangkat Lunak "
                        {{ $mahasiswa->prodi == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                        Rekayasa Perangkat Lunak
                    </option>
                    <option name="prodi" value="Informatika " {{ $mahasiswa->prodi == 'Informatika' ? 'selected' : '' }}>
                        Informatika
                    </option>
                    <option name="prodi" value="Sains Data " {{ $mahasiswa->prodi == 'Sains Data' ? 'selected' : '' }}>
                        Sains Data
                    </option>
                    <option name="prodi" value="Teknologi Informasi "
                        {{ $mahasiswa->prodi == 'Teknologi Informasi' ? 'selected' : '' }}>
                        Teknologi Informasi
                    </option>
                    <option name="prodi" value="Sistem Informasi "
                        {{ $mahasiswa->prodi == 'Sistem Informasi' ? 'selected' : '' }}>
                        Sistem Informasi
                    </option>
                    <option name="prodi" value="Teknik Telekomunikasi "
                        {{ $mahasiswa->prodi == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                        Teknik Telekomunikasi
                    </option>
                    <option name="prodi" value="Teknik Logistik "
                        {{ $mahasiswa->prodi == 'Teknik Logistik' ? 'selected' : '' }}>
                        Teknik Logistik
                    </option>
                    <option name="prodi" value="Teknik Industri "
                        {{ $mahasiswa->prodi == 'Teknik Industri' ? 'selected' : '' }}>
                        Teknik Industri
                    </option>
                    <option name="prodi" value="Teknik Elektro "
                        {{ $mahasiswa->prodi == 'Teknik Elektro' ? 'selected' : '' }}>
                        Teknik Elektro
                    </option>
                    <option name="prodi" value="Teknik Komputer "
                        {{ $mahasiswa->prodi == 'Teknik Komputer' ? 'selected' : '' }}>
                        Teknik Komputer
                    </option>
                    <option name="prodi" value="Bisnis Digital "
                        {{ $mahasiswa->prodi == 'Bisnis Digital' ? 'selected' : '' }}>
                        Bisnis Digital
                    </option>
                </select>
                @error('prodi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" id="foto"
                    value="{{ asset('storage/image/' . $mahasiswa->foto) }}">
                <div class="mt-3">
                    <p>Current Photo:</p>
                    @if ($mahasiswa->foto)
                        <img src="{{ asset('storage/image/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->foto }}"
                            style="max-width: 200px; height: auto;">
                    @else
                        <p>Foto Tidak Tersedia</p>
                    @endif
                </div>
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
