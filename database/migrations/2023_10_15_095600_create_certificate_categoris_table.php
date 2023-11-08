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
        Schema::create('certificate_categoris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('background_depan')->nullable();
            $table->string('background_belakang')->nullable();
            $table->string('tata_letak')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_categoris');
    }
};
