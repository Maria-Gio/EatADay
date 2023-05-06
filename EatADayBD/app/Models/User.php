<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function favouriteRecipes()
    {
        return $this->hasMany(UserFavouriteRecipes::class);
    }
    public function ingredients()
    {
        return $this->hasMany(ingredient::class);
    }


    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }

    //1:N inversa
    public function role()
    {
        return $this->belongsTo(Role::class);


    }
    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }
    public function userGeneralShoppingList()
    {
        return $this->hasOne(GeneralShoppingList::class);
    }
}
