<?php

use Database\Seeders\CitiesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('id')
                ->on('states');

            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => CitiesSeeder::class,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}
