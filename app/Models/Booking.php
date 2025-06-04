<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',           // ID peserta (user)
        'class_package_id',  // ID kelas yang dibooking
    ];

    // Relasi ke User (Peserta)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke ClassPackage (Kelas)
    public function classPackage()
    {
        return $this->belongsTo(ClassPackage::class);
    }
}
