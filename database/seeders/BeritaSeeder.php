<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        Berita::create([
            'judul' => 'Berita Contoh',
            'isi' => 'Ini contoh isi berita dummy.',
            'gambar' => null,
            'kategori_id' => 1,
            'user_id' => 3,
            'status' => 'draft'
        ]);
    }
}
