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
        Schema::create('vans', function (Blueprint $table) {
            $table->id("VanID");
            $table->timestamps();
            $table->string("NumberPlate");
            $table->integer("VanCapacity");
            
            $table->unsignedBigInteger("VanOperatorID");
            $table->foreign("VanOperatorID")
                  ->references("VanOperatorID")
                  ->on("operators")
                  ->onDelete("CASCADE");

            $table->unsignedBigInteger("DriverID");
            $table->foreign("DriverID")
                  ->references("DriverID")
                  ->on("drivers")
                  ->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vans');
    }
};
