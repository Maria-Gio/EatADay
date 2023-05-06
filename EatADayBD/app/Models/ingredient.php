<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'price_k',
        'user_id',
        'isBought',
        'userLike',
        'priceUp'
    ];

    public function supermarket() {
        return $this->belongsToMany(Supermarket::class);
        }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relaciones muchos a muchos

}
