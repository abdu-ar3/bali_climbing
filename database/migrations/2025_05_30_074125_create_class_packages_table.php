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
        Schema::create('class_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kelas
            $table->text('description'); // Deskripsi kelas
            $table->integer('price'); // Harga kelas
            $table->integer('duration'); // Durasi kelas (dalam jam)
            $table->timestamp('schedule'); // Jadwal kelas
            $table->foreignId('instructor_id')->constrained('users'); // Relasi ke instruktur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_packages');
    }
};
