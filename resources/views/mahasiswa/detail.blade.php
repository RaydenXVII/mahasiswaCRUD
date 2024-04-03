@extends('layouts.template')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/image/' . $mahasiswa->foto) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">{{ $mahasiswa->nim }}</h6>
                    <h5 class="card-title">{{ $mahasiswa->nama }}</h5>
                    <p class="card-text">Email : {{ $mahasiswa->email }}</p>
                    <p class="card-text lh-1 ">No HP : {{ $mahasiswa->nohp }}</p>
                    <p class="card-text lh-1">Prodi : {{ $mahasiswa->jurusan }}</p>
                    <a href="/mahasiswa" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
