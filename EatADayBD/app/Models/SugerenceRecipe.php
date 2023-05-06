<?php

namespace App\Models;

use App\Http\Controllers\ingredientController;
use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SugerenceRecipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        // 'photo',
        'ingredients',
        'description',
        'isChecked',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //relaciones muchos a muchos


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
