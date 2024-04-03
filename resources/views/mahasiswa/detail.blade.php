@extends('layouts.template')

@section('title', 'Detail Mahasiswa')

@section('content')
<h1 class="mb-3, text-center">Detail Mahasiswa</h1>
<div class="container py-5">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 28rem">
            <img src="{{ asset('storage/image/' . $mahasiswa->foto) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6 class="card-title, text-center">{{ $mahasiswa->nim }}</h6>
                <h5 class="card-title, text-center">{{ $mahasiswa->nama }}</h5>
                <p class="card-text">Email : {{ $mahasiswa->email }}</p>
                <p class="card-text">No HP : {{ $mahasiswa->nohp }}</p>
                <p class="card-text">Prodi : {{ $mahasiswa->jurusan }}</p>
                <a href="/mahasiswa" class="btn btn-primary">Back</a>
            </div>
            </div>
        </div>
    </div>
@endsection
