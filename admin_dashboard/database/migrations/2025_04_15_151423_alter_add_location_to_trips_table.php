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
        Schema::table('trips', function (Blueprint $table) {
            //
            $table->dropColumn('origin');
            $table->dropColumn('destination');
            $table->dropColumn('destination_name');
            $table->dropColumn('van_location');

            $table->unsignedBigInteger('VanID')->nullable();
            $table->string('type')->default('PICKUP');
            $table->string('start_latitude')->nullable();
            $table->string('start_longitude')->nullable();
            $table->string('end_latitude')->nullable();
            $table->string('end_longitude')->nullable();
            $table->string('current_latitude')->nullable();
            $table->string('current_longitude')->nullable();
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('trip_status')->nullable()->default('ONGOING');

            $table->foreign('VanID')
                ->references('VanID')
                ->on('vans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            //
        });
    }
};
