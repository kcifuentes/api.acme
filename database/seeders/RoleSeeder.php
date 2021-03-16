<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'candidate',
            'client_recruiter',
            'client_admin',
            'admin',
            'support'
        ];

        foreach ($data as $datum) {
            Role::create([
                'name' => $datum
            ]);
        }
    }
}
