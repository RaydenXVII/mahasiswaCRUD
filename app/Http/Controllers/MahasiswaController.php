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
    public function show($id){
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    //menampilkan form tambah mahasiswa
    public function create(){
        return view('mahasiswa.create');
    }

    //untuk menambah data mahasiswa
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|digits:10|unique:mahasiswas',
            'nama' => 'required',
            'email' => 'required|unique:mahasiswas',
            'nohp' => 'required|digits:12|unique:mahasiswas',
            'jurusan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomString = Str::random(5);
            $name_file = $randomString . "_" . $file->getClientOriginalName();
            $file->storeAs('public/image/', $name_file);
            $validatedData['foto'] = $name_file;
        };

        Mahasiswa::create($validatedData);
        return redirect('/mahasiswa');
    }

    //menampilkan form edit mahasiswa yang dipilih
    public function edit($id){
        $mahasiswa = Mahasiswa::find($id);

        // dd($mahasiswa);

        return view('mahasiswa.edit', [
           'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $validatedData = $request->validate([
            'nim' =>'nullable|digits:10|unique:mahasiswas',
            'nama' => 'nullable',
            'email' => 'nullable|unique:mahasiswas',
            'nohp' => 'nullable|unique:mahasiswas|digits:12',
            'jurusan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomString = Str::random(5);
            $name_file = $randomString . "_" . $file->getClientOriginalName();
            $file->storeAs('public/image/', $name_file);
            $validatedData['foto'] = $name_file;
        };

        Mahasiswa::where('id', $id)->update($validatedData);
        return redirect('/mahasiswa');
    }

    //menghapus data Mahasiswa
    public function destroy($id)
    {
        $image = Mahasiswa::find($id);
        Storage::delete('public/image/' . $image->img);
        $image->delete();
        return redirect('/mahasiswa');
    }
}
