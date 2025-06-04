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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relasi ke user (Customer)
            $table->foreignId('class_package_id')->constrained('class_packages'); // Relasi ke kelas
            $table->text('feedback'); // Kolom untuk ulasan
            $table->integer('rating')->default(0); // Kolom untuk rating, misalnya 1-5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
