<?php

namespace App\Models;

use App\Http\Controllers\ingredientController;
use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'photo',
        'ingredients',
        'displayIngredients',
        'preparation',
        'description',
        'isChecked'

    ];
    protected $casts = [
        'ingredients' => 'array',
        'displayIngredients'=>'array',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];




    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function users()
{
    return $this->hasMany(UserFavouriteRecipes::class);
}


}
