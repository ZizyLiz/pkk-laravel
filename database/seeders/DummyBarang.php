<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyBarang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'merk'  => 'Gree',
                'seri'=> '1212',
                'spesifikasi'=>"sakaskdflsafsa",
                'stok'=>3,
                'kategori_id'=>'2',
            ]
        ];
        foreach ($data as $key => $value) {
            Barang::create($value);
        }
    }
}
