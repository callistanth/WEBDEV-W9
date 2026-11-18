<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laptop;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laptop::create ([
            'brand' => "ASUS",
            'model' => "TUF GAMING A15",
            'processor' => "Ryzen 7",
            'ram' => "8"
        ]);
    }
}
