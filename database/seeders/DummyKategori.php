<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'deskripsi'  => 'Modal',
                'kategori'=> 'M',
            ]
        ];
        foreach ($data as $key => $value) {
            Kategori::create($value);
        }
    }
}
