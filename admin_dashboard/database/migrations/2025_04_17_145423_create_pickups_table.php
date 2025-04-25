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
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ParentID');
            $table->unsignedBigInteger('ChildID');
            $table->unsignedBigInteger('VanOperatorID');
            $table->dateTime('verification_time');
            $table->timestamps();

            $table->foreign('ParentID')->references('ParentID')->on('parentals')->onDelete('cascade');
            $table->foreign('ChildID')->references('ChildID')->on('children')->onDelete('cascade');
            $table->foreign('VanOperatorID')->references('VanOperatorID')->on('operators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};
