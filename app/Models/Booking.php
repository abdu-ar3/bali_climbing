<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_package_id',
        'booking_date',
        'status',
        'bukti_pembayaran'
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
