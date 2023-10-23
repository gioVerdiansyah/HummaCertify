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
        Schema::create('detail_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('certificate_id')->constrained()->cascadeOnDelete();
            $table->string('materi');
            $table->integer('jp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_certificates');
    }
};
