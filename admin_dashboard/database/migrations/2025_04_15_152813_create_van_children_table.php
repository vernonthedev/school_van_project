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
        Schema::create('van_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('VanID')->nullable();
            $table->unsignedBigInteger('ChildID')->nullable();
            $table->timestamps();

            // write foreign key relations
            $table->foreign('VanID')
                ->references('VanID')
                ->on('vans')
                ->onDelete('CASCADE');

            $table->foreign('ChildID')
                ->references('ChildID')
                ->on('children')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('van_children');
    }
};
