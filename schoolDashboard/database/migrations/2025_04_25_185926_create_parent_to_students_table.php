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
        Schema::create('parent_to_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name',100);
            $table->string('longitude',50)->nullable()->index();
            $table->string('latitude',50)->nullable()->index();
            $table->string('phoneNumber',20)->nullable()->index();
            $table->string('gender',10);
            $table->string('occupation',100)->nullable();
            $table->string('address');
            $table->string('role')->default('parent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_to_students');
    }
};
