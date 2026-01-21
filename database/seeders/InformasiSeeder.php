<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $informasi = [
            [
                'judul' => 'Pengumuman Libur Semester',
                'isi' => 'Diberitahukan kepada seluruh mahasiswa bahwa libur semester genap akan dimulai pada tanggal 25 Januari 2026 sampai dengan 10 Februari 2026. Selamat berlibur!',
                'kategori' => 'Akademik',
                'penulis' => 'Bagian Akademik',
                'image' => null,
                'video' => null
            ],
            [
                'judul' => 'Lomba Karya Tulis Ilmiah',
                'isi' => 'Ikuti lomba karya tulis ilmiah tingkat nasional dengan tema "Inovasi Teknologi untuk Kemajuan Bangsa". Pendaftaran dibuka hingga 15 Februari 2026. Hadiah jutaan rupiah menanti!',
                'kategori' => 'Kemahasiswaan',
                'penulis' => 'BEM Kampus',
                'image' => null,
                'video' => null
            ],
            [
                'judul' => 'Seminar Bisnis Digital',
                'isi' => 'Hadirilah seminar bisnis digital dengan pembicara ahli di bidangnya. Acara akan dilaksanakan pada tanggal 20 Februari 2026 di Auditorium Utama. Pendaftaran gratis!',
                'kategori' => 'Event',
                'penulis' => 'Himpunan Mahasiswa Bisnis',
                'image' => null,
                'video' => null
            ],
            [
                'judul' => 'Jadwal UAS Susulan',
                'isi' => 'Bagi mahasiswa yang belum mengikuti UAS, jadwal susulan akan dilaksanakan pada tanggal 28-30 Januari 2026. Harap segera melapor ke bagian akademik.',
                'kategori' => 'Akademik',
                'penulis' => 'Bagian Akademik',
                'image' => null,
                'video' => null
            ],
            [
                'judul' => 'Lowongan Magang',
                'isi' => 'Perusahaan mitra kampus membuka lowongan magang untuk posisi Web Developer dan UI/UX Designer. Kirimkan CV dan portofolio Anda sebelum tanggal 10 Februari 2026.',
                'kategori' => 'Karir',
                'penulis' => 'Pusat Karir',
                'image' => null,
                'video' => null
            ]
        ];

        foreach ($informasi as $info) {
            Informasi::create($info);
        }
    }
}
