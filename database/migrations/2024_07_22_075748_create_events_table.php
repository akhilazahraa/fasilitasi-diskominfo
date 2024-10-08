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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opd_id');
            $table->foreignId('isp_id');
            $table->string('name');
            $table->string('location');
            $table->string('details_location');
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('status')->nullable();
            $table->string('kebutuhan')->nullable();
            $table->string('documentation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
