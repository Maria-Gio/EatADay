<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'text',
        'photo',
        'video'
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
