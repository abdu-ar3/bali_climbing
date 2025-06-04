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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Relasi ke pengguna (Customer)
            $table->foreignId('class_package_id')->constrained('class_packages'); // Relasi ke kelas yang dibooking
            $table->timestamp('booking_date')->default(now()); // Tanggal pemesanan
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Status pemesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
