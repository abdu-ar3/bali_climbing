<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'contact'];  // Kolom yang dapat diisi massal

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
