<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo'
    ];

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class);
    }
    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }


}
