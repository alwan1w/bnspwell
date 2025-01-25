<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Konghucu',
        ];

        foreach ($data as $agama) {
            Agama::create(['nama' => $agama]);
        }
    }
}
