<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\UserFavouriteRecipes;
use Illuminate\Http\Request;

class UserFavouriteRecipesController extends Controller
{
    public function getById(Request $request, $idUser, $idRecipe)
    {
        $user = User::find($idUser);
        $recipe = Recipe::find($idRecipe);
        if ($user && $recipe) {
            $userFavouriteRecipes = UserFavouriteRecipes::where('user_id', $user->id)
                ->where('recipe_id', $recipe->id)
                ->get();
            if ($userFavouriteRecipes) {
                $response = [
                    'success' => true,
                    'message' => 'Favourite recipes found successfully',
                    'data' => $userFavouriteRecipes
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'Favourite recipes not found',
                'data' => null
            ];
            return response()->json($response, 404);
        }
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];

        return response()->json($response, 404);
    }
    public function markAsFavourite($userId, $recipeId)
    {
        $favourite[0] = UserFavouriteRecipes::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->get();

        if (!$favourite[0]) {
            $newFavouriteList = UserFavouriteRecipes::create([
                'user_id' => $userId,
                'recipe_id' => $recipeId,
                'isFavourite' => true
            ]);

            $response = [
                'success' => true,
                'message' => 'Fav List created',
                'data' => $newFavouriteList
            ];

            return response()->json($response, 404);
        }

        $favourite[0]->isFavourite = true;
        $favourite[0]->save();

        $response = [
            'success' => false,
            'message' => 'Fav List not found',
            'data' => null
        ];

        return response()->json($response, 404);
    }
    public function getFavouriteRecipes($user_id)
    {
        $favourites = UserFavouriteRecipes::where('user_id', $user_id)
            ->where('isFavourite', true)
            ->with('recipe')
            ->get();
        $response = [
            'success' => true,
            'message' => 'Fav List found successfully',
            'data' => $favourites
        ];

        return response()->json($response);
    }
}
