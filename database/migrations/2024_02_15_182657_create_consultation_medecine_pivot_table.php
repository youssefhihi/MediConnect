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
        Schema::disableForeignKeyConstraints();
        Schema::create('consultation_medication', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id');
            $table->unsignedBigInteger('medication_id');       
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_medication');
    }
};
