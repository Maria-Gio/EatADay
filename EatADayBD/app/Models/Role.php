<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',

    ];
    protected $hidden = [

        'created_at',
        'updated_at'
    ];

    //1:N
    public function user()
    {
        return $this->hasMany(User::class);
    }
}