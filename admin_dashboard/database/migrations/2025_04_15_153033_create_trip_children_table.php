<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TripID')->nullable();
            $table->unsignedBigInteger('VanChildID')->nullable();
            $table->boolean('hasEnteredVan')->default(false);
            $table->boolean('hasExitedVan')->default(false);
            $table->time('entryTime')->nullable();
            $table->time('exitTime')->nullable();
            $table->unsignedBigInteger('VanOperatorID')->nullable();
            $table->timestamps();

            // write foreign key relations
            $table->foreign('TripID')
                ->references('id')
                ->on('trips')
                ->onDelete('CASCADE');

            $table->foreign('VanChildID')
                ->references('id')
                ->on('van_children')
                ->onDelete('CASCADE');

            $table->foreign('VanOperatorID')
                ->references('VanOperatorID')
                ->on('operators')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_children');
    }
};
