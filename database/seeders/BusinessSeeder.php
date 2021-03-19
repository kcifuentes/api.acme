<?php

namespace Database\Seeders;

use Acme\Domain\Profile\BusinessTypes;
use Acme\Infrastructure\Eloquent\Models\Business;
use Acme\Infrastructure\Eloquent\Models\Language;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $data = File::get(base_path('database/initialData/business.json'));
            $data = json_decode($data);

            $cantSectors = 1;
            foreach ($data->sectors as $sector) {
                $newBusiness = new Business([
                    'type' => BusinessTypes::BUSINESS_TYPE_SECTOR
                ]);
                $newBusiness->save();

                $this->saveLanguages($sector, $newBusiness);

                if ($cantSectors == 2 && env('APP_ENV') == 'testing') {
                    break;
                }

                $cantSectors++;
            }
        } catch (FileNotFoundException $e) {
        }
    }

    private function saveLanguages(mixed $sector, Business $newBusiness): void
    {
        $objectVar = get_object_vars($sector);
        $properties = array_keys($objectVar);

        foreach ($properties as $property) {
            $language = Language::where('iso_code', $property)->first();
            $newBusiness->languages()->attach($language, ['value' => $sector->{$property}]);
        }
    }
}
