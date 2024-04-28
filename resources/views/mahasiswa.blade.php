@extends('layouts.template')

@section('content')
    <h1 class="text-center">Daftar Mahasiswa</h1>
    <a href="/mahasiswa/create" class="mb-4 btn btn-primary">Add</a>
    <div>
        <table class="table rounded table-striped table-hover">
            <thead class="table-secondary">
                <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>
                            <a href="/mahasiswa/{{ $mahasiswa->id }}" class="btn btn-primary">Detail</a>
                            <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
