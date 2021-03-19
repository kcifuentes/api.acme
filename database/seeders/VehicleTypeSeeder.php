<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'particular'],
            ['name' => 'público'],
        ];

        foreach ($data as $datum) {
            VehicleType::create($datum);
        }
    }
}
