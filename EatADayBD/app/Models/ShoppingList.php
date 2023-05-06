<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredients',
        'user_id',
        'supermarket_id'

    ];
    protected $casts = [
        'ingredients' => 'array',
    ];
    protected $hidden = [

        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supermarket()
    {
        return $this->belongsTo(Supermarket::class);
    }
}
