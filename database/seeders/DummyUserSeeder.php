<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama'  => 'Mimin',
                'email'=> 'test@gmail.com',
                'password'=> bcrypt('123'),
                'Admin'=>True,
            ]
        ];
        foreach ($data as $key => $value) {
            User::create($value);
        }
    }
}
