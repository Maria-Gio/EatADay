<?php

namespace App\Http\Controllers;

use App\Models\SugerenceRecipe;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use Throwable;

class SugerenceRecipeController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $recipe = SugerenceRecipe::all();
        } catch (Throwable $e) {
            return response('Any Recipe found');
        }

        $response = [];

        if (isset($recipe[0])) {
            $response = [
                'success' => true,
                'message' => "Recipe fetched successfully",
                'data' => $recipe
            ];

            return response()->json($response);
        } else {

            $response = [
                'success' => false,
                'message' => "No recipe found",
                'data' => null
            ];
            return response()->json($response);
        }
    }
    public function getById(Request $request, $id)
    {
        $recipe = SugerenceRecipe::find($id);
        json_decode($recipe->ingredients);
        json_decode($recipe->displayIngredients);
        if ($recipe != null) {
            $response = [
                'success' => true,
                'message' => 'Recipe found successfully',
                'data' => $recipe
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Recipe not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = SugerenceRecipe::insertGetId($request->validate([
                'title' => 'required|string',
                // 'photo' => 'nullable|string',
                'ingredients' => 'required|string',
                'description' => 'required|string',
                'isChecked' =>'boolean',
                'user_id'=>'nullable|numeric',
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Recipe has not been created1, some data may be missing',
                'data' =>$e
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'Recipe created successfully',
                'data' => SugerenceRecipe::findOrFail($id)
            ];
            return response()->json($response);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $deletedRecipe = SugerenceRecipe::find($id);

            $recipe = $deletedRecipe;
            $recipe->delete();
            $response = [
                'success' => true,
                'message' => 'Recipe was deleted',
                'data' => $deletedRecipe
            ];
            return response()->json($response);

        } catch (Throwable $e) {
            report($e);
            $response = [
                'success' => false,
                'message' => 'Recipe has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        if ($recipe = SugerenceRecipe::find($id)) {

            try {
                $recipe->update($request->validate([
                    'title' => 'required|string',
                    'photo' => 'nullable|string',
                    'ingredients' => 'required|string',
                    'preparation' => 'required|string',
                    'isChecked' =>'boolean'
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Recipe has not been updated, change the role name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $recipe->save();
            $response = [
                'success' => true,
                'message' => 'Recipe updated successfully',
                'data' => $recipe
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Recipe not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }
}
