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
        Schema::create('parentals', function (Blueprint $table) {
            $table->id("ParentID");
            $table->timestamps();
            $table->string("ParentName");
            $table->decimal("Longitude");
            $table->decimal("Latitude");
            $table->text("Address");
            $table->string("PhoneNumber");
            $table->string("Email")-> unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentals');
    }
};
