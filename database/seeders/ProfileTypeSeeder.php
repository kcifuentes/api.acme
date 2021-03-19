<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Illuminate\Database\Seeder;

class ProfileTypeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id'   => ProfileType::PROFILE_TYPE_OWNER,
                'name' => 'owner'
            ],
            [
                'id'   => ProfileType::PROFILE_TYPE_DRIVER,
                'name' => 'driver'
            ],
        ];

        foreach ($data as $datum) {
            $profile = new ProfileType();
            $profile->id = $datum['id'];
            $profile->name = $datum['name'];

            $profile->save();
        }
    }
}
