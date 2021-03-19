<?php

use Database\Seeders\ProfileTypeSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTypesTable extends Migration
{
    public function up(): void
    {
        Schema::create('profile_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => ProfileTypeSeeder::class,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_types');
    }
}
