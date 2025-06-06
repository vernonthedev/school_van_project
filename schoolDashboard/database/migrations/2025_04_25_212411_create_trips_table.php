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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('van_id')->constrained()->onDelete('cascade');
            $table->foreignId('van_student_id')->constrained('van_student')->onDelete('cascade')->nullable();
            $table->string('sourceRoute');
            $table->string('destinationRoute');
            $table->time('startTime');
            $table->time('endTime');
            $table->date('dateOfTrip');
            $table->enum('tripStatus',['scheduled','ongoing','completed','cancelled'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
