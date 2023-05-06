<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Throwable;


class IngredientController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $ingredient = Ingredient::all();
        } catch (Throwable $e) {
            return response('Any ingredient found', 200);
        }

        $response = [];

        if (isset($ingredient[0])) {
            $response = [
                'success' => true,
                'message' => "Ingredients fetched successfully",
                'data' => $ingredient
            ];

            return response()->json($response, 200);
        } else {

            $response = [
                'success' => false,
                'message' => "No Ingredients found",
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = Ingredient::insertGetId($request->validate([
                'ingredient' => 'required|string|unique:ingredients'
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Ingredient has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'ingredient created successfully',
                'data' => Ingredient::findOrFail($id)
            ];
            return response()->json($response, 200);
        }





    }
    public function delete(Request $request, $id)
    {
        try {
            $deletedIngredient = Ingredient::find($id);

            $ingredient = $deletedIngredient;
            $ingredient->delete();
            $response = [
                'success' => true,
                'message' => 'ingredient was deleted',
                'data' => $deletedIngredient
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Ingredient has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }



    }
    public function update(Request $request, $id)
    {


        if ($ingredient = Ingredient::find($id)) {

            try {
                $ingredient->update($request->validate([
                    'ingredient' => 'string',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Ingredient has not been updated, change the Ingredient name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $ingredient->save();
            $response = [
                'success' => true,
                'message' => 'Ingredient updated successfully',
                'data' => $ingredient
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Ingredient not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function getById(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        if ($ingredient != null) {
            $response = [
                'success' => true,
                'message' => 'Ingredient found successfully',
                'data' => $ingredient
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Ingredient not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);
    }

    public function supermarket(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        if ($ingredient) {

            if ($ingredient != null && $ingredient->supermarket) {
                $response = [
                    'success' => true,
                    'message' => 'Supermarkets found successfully',
                    'data' => $ingredient->supermarket
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Supermarkets not found',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'User not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
    public function user(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        if ($ingredient) {

            if ($ingredient != null && $ingredient->user) {
                $response = [
                    'success' => true,
                    'message' => 'Users found successfully',
                    'data' => $ingredient->user
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Users not found',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Users not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
    public function recipes(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        if ($ingredient) {

            if ($ingredient != null && $ingredient->recipe) {
                $response = [
                    'success' => true,
                    'message' => 'Recipe found successfully',
                    'data' => $ingredient->recipe
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Recipe not found',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Ingredient not found',
                'data' => null
            ];
        }

        return response()->json($response);

    }
    public function selfIngredientSearch(Request $request, $name)
    {


        $ingredients = Ingredient::where('name', 'LIKE', "%$name%", )->where('user_id', null)->get();


        $response = [
            'success' => true,
            'message' => 'Ingredients fetched successfully',
            'data' => $ingredients
        ];
        return response()->json($response);
    }
    public function mixIngredientSearch(Request $request, $name)
    {


        $ingredients = Ingredient::where('name', 'LIKE', "%$name%")->get();

        $response = [
            'success' => true,
            'message' => 'Ingredients fetched successfully',
            'data' => $ingredients
        ];
        return response()->json($response);
    }

}
