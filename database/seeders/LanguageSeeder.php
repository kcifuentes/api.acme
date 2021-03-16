<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'     => 'Español Colombia',
                'iso_code' => 'es-co'
            ],
            [
                'name'     => 'Ingles Estados Unidos',
                'iso_code' => 'en-us'
            ]
        ];

        foreach ($data as $datum) {
            Language::create($datum);
        }
    }
}
