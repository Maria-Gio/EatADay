<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SupermarketController;

use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\GeneralShoppingListController;

use App\Http\Controllers\RecommendationController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SugerenceRecipeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//LOGIN
Route::post('/login', [LoginController::class, 'logIn']);
Route::post('/signup', [LoginController::class, 'signUp']);

Route::group(
    ['middleware' => 'auth:api'],
    function () {
        Route::post('/logout', [LoginController::class, 'logOut']);
        Route::get('/soyyo', [LoginController::class, 'userInfo']);
    }
);

//USER
Route::prefix('/users')->group(function () {
    Route::controller(UserController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::get(
                '/{id}/getuserid',
                'getUserID',
            );
            Route::get('/{id}/role', 'role');
            Route::get('/{id}/ingredients', 'ingredients');
            Route::middleware('auth:api')->delete(
                '/{id}',
                'delete'
            );
            Route::middleware('auth:api')->get('/{id}/recipes', 'recipes');

        }
    );
});

//RECIPES
Route::prefix('/recipes')->group(function () {
    Route::controller(RecipeController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '/search',
                'search'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get('/{id}/ingredient', 'ingredient');
            Route::get('/{id}/user', 'users');
        }
    );
});

//SHOPPINGLIST

Route::prefix('/shoppingList')->group(function () {
    Route::controller(ShoppingListController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{user_id}/{supermarket_id}',
                'getById'
            );
            Route::delete(
                '/{user_id}/{supermarket_id}/{ingredient_id}',
                'deleteIngredient'
            );
            Route::post(
                '/search',
                'search'
            );
            Route::post(
                '/bought',
                'setBoughtTrue'
            );
            Route::post(
                '/edit',
                'editIngredient'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::post('/insert', 'insertIngredient');
            Route::post('/{supermarket}', 'getSupermarket');
        }
    );
});
Route::prefix('/generalShoppingList')->group(function () {
    Route::controller(GeneralShoppingListController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '/search',
                'search'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::delete(
                '/{user_id}/{ingredient}',
                'deleteIngredient'
            );
            Route::post('/insert', 'insertIngredient');

        }
    );
});

//COMMENTS
Route::prefix('/comments')->group(function () {
    Route::controller(CommentController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get('/{id}/user', 'user');

        }
    );
});
//ROLES
Route::prefix('/roles')->group(function () {
    Route::controller(RoleController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get('/{id}/users', 'users');

        }
    );
});

//INGREDIENTS
Route::prefix('/ingredients')->group(function () {
    Route::controller(IngredientController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::get(
                '/search/{name}',
                'selfIngredientSearch'
            );
            Route::get(
                '/matchSearch/{name}',
                'mixIngredientSearch'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'update'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get(
                '/{id}/user',
                'user'
            );
            Route::get('/{id}/recipes', 'recipes');
            Route::get('/{id}/supermarket', 'supermarket');
        }
    );
});


Route::prefix('/ingredients')->group(function () {
    Route::controller(IngredientController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'update'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get(
                '/{id}/user',
                'user'
            );
        }
    );
});
Route::prefix('/supermarkets')->group(function () {
    Route::controller(SupermarketController::class)->group(
        function () {
            Route::get(
                '',
                'getAll'
            );

            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'modify'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get('/{id}/ingredients', 'ingredients');
        }
    );
});

//RECOMMENDATIONS
Route::prefix('/recommendations')->group(function () {
    Route::controller(RecommendationController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'modify'
            );
            Route::delete(
                '/{id}',
                'delete'
            );

        }
    );
});

//SugerenceRecipes
Route::prefix('/sugerenceRecipes')->group(function () {
    Route::controller(SugerenceRecipeController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '/search',
                'search'
            );
            // ->where('name','[a-zA-Z]+' );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get('/{id}/user', 'users');
        }
    );
});
