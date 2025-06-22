<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',           // Nama kelas
        'description',    // Deskripsi kelas
        'price',          // Harga kelas
        'duration',       // Durasi kelas (dalam jam)
        'schedule',       // Jadwal kelas
        'instructor_id',  // Instruktur yang mengajar
        'image',
    ];

    // Relasi ke Instruktur
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id'); // Relasi ke instruktur
    }


    public function participants()
    {
        return $this->hasMany(ClassParticipant::class, 'class_package_id');
    }
}
