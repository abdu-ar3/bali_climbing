<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',           // ID user (Customer)
        'class_package_id',  // ID class package yang diberikan feedback
        'feedback',          // Ulasan dari peserta
        'rating',            // Rating untuk kelas
    ];

    protected $table = 'feedbacks';

    // Relasi ke User (Customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke ClassPackage
    public function classPackage()
    {
        return $this->belongsTo(ClassPackage::class);
    }
}

