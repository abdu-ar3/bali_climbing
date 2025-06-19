<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassParticipant extends Model
{
    use HasFactory;
    protected $table = 'class_participant';

    protected $fillable = ['user_id', 'class_package_id'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke ClassPackage
    public function classPackage()
    {
        return $this->belongsTo(ClassPackage::class, 'class_package_id');
    }
}