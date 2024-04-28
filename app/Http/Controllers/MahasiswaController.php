<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    //Menampilkan Seluruh data Mahasiswa
    public function index()
    {
        return view('mahasiswa', ['mahasiswas' => Mahasiswa::All()]);
    }

    //menampilkan detail dari mahasiswa yang di pilih
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    //menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    //untuk menambah data mahasiswa
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|digits:10|unique:mahasiswas',
            'nama' => 'required',
            'email' => 'required|unique:mahasiswas',
            'nohp' => 'required|digits_between:11,12|unique:mahasiswas',
            'prodi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomString = Str::random(10);
            $name_file = $randomString . "_" . $file->getClientOriginalName();
            $file->storeAs('public/image/', $name_file);
            $validatedData['foto'] = $name_file;
        }
        ;

        Mahasiswa::create($validatedData);
        return redirect('/mahasiswa');
    }

    //menampilkan form edit mahasiswa yang dipilih
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        // dd($mahasiswa);

        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    //mengupdate data mahasiswa yang dipilih
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|digits:10|unique:mahasiswas',
            'nama' => 'nullable',
            'email' => 'nullable|unique:mahasiswas',
            'nohp' => 'nullable|digits_between:11,12|unique:mahasiswas',
            'prodi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mahasiswa = Mahasiswa::find($id);

        // Mengecek Apakah Terdapat File img yang baru
        if ($request->hasFile('foto')) {
            // Menghapus foto lama apbila ada
            if ($mahasiswa->foto) {
                Storage::delete('public/image/' . $mahasiswa->foto);
            }

            // Menyimpan foto yang baru
            $file = $request->file('foto');
            $randomString = Str::random(10);
            $name_file = $randomString . "_" . $file->getClientOriginalName();
            $file->storeAs('public/image/', $name_file);
            $validatedData['foto'] = $name_file;
        }

        $mahasiswa->update($validatedData);
        return redirect('/mahasiswa');
    }

    //menghapus data Mahasiswa
    public function destroy($id)
{
    $mahasiswa = Mahasiswa::find($id);

    // Memeriksa apakah gambar itu ada sebelum mencoba menghapusnya
    if ($mahasiswa->foto) {
        // Menghapus gambar
        Storage::delete('public/image/' . $mahasiswa->foto);
    }

    // Menghapus Record mahasiswa
    $mahasiswa->delete();

    return redirect('/mahasiswa');
}
}
