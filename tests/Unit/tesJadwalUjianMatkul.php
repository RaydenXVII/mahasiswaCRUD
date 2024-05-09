<?php

namespace Tests\Unit;

use App\Models\Mahasiswa;
use PHPUnit\Framework\TestCase;

class TesJadwal extends TestCase
{
    public function testJadwalUjianSemuaMatkul()
    {
        $mahasiswa = new Mahasiswa();
        $jadwalUjian = $mahasiswa->tampilJadwalUjian();

        $this->assertNotEmpty($jadwalUjian);

        foreach ($jadwalUjian as $matkul) {
            $this->assertArrayHasKey('nama_matkul', $matkul);
            $this->assertArrayHasKey('tanggal_ujian', $matkul);
            $this->assertArrayHasKey('waktu_ujian', $matkul);
            $this->assertArrayHasKey('ruang_ujian', $matkul);
        }
    }
    public function testCariJadwalUjianBerdasarkanNamaMatkul()
    {
        $mahasiswa = new Mahasiswa();
        $namaMatkul = "Dasar Pemodelan Perangkat Lunak";
        $jadwalUjian = $mahasiswa->cariJadwalUjian($namaMatkul);

        $this->assertNotEmpty($jadwalUjian);

        $this->assertEquals($namaMatkul, $jadwalUjian['nama_matkul']);
    }
    public function testCariJadwalUjianBerdasarkanTanggal()
    {
        $mahasiswa = new Mahasiswa();
        $tanggalUjian = "2024-04-27";
        $jadwalUjian = $mahasiswa->cariJadwalUjianBerdasarkanTanggal($tanggalUjian);

        $this->assertNotEmpty($jadwalUjian);

        $this->assertEquals($tanggalUjian, $jadwalUjian['tanggal_ujian']);
    }
}
