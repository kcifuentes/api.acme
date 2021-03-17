<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Cédula de ciudadanía'],
            ['name' => 'Cédula de extranjería'],
            ['name' => 'Pasaporte'],
        ];

        foreach ($data as $datum) {
            DocumentType::create($datum);
        }
    }
}
