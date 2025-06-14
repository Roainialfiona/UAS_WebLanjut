<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::create(['nama_kategori' => 'Teknologi']);
        Kategori::create(['nama_kategori' => 'Politik']);
        Kategori::create(['nama_kategori' => 'Olahraga']);
        Kategori::create(['nama_kategori' => 'Pendidikan']);
    }
}
