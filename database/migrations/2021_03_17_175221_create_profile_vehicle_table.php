<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileVehicleTable extends Migration
{
    public function up(): void
    {
        Schema::create('profile_vehicle', function (Blueprint $table) {
            $table->id();
            $table->dateTime('assignment_date');
            $table->dateTime('disengagement_date')->nullable();

            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles');

            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_vehicle');
    }
}
