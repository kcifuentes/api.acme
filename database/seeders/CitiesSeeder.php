<?php

namespace Database\Seeders;

use Acme\Infrastructure\Eloquent\Models\City;
use Acme\Infrastructure\Eloquent\Models\Country;
use Acme\Infrastructure\Eloquent\Models\State;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $data = File::get(base_path('database/initialData/colombia-dev.json'));
            $data = json_decode($data);

            $country = new Country();
            $country->name = $data->name;
            $country->iso_code = $data->iso_code;

            $country->save();

            foreach ($data->states as $state) {
                $newState = new State();
                $newState->name = $state->name;
                $country->states()->save($newState);

                foreach ($state->cities as $city) {
                    $newCity = new City();
                    $newCity->name = $city->name;

                    $newState->cities()->save($newCity);
                }
            }
        } catch (FileNotFoundException $e) {
        }
    }
}
