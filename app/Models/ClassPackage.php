<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPackage extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi massal
    protected $fillable = [
        'name',           // Nama kelas
        'description',    // Deskripsi kelas
        'price',          // Harga kelas
        'duration',       // Durasi kelas (dalam jam)
        'schedule',       // Jadwal kelas
        'instructor_id',  // Instruktur yang mengajar
    ];

    // Relasi ke Instruktur
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id'); // Relasi ke instruktur
    }


    // Relasi ke Peserta
    public function participants()
    {
        return $this->belongsToMany(User::class, 'class_participant');
    }
}
