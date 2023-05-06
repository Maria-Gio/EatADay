<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\ShoppingList;
use App\Models\Supermarket;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class ShoppingListController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $shoppingList = ShoppingList::all();
        } catch (Throwable $e) {
            return response('Any ShoppingList found');
        }

        $response = [];

        if (isset($shoppingList[0])) {
            $response = [
                'success' => true,
                'message' => "ShoppingList fetched successfully",
                'data' => $shoppingList
            ];

            return response()->json($response);
        } else {

            $response = [
                'success' => false,
                'message' => "No shoppingList found",
                'data' => null
            ];
            return response()->json($response);
        }
    }
    public function getById(Request $request, $idUser, $idSupermercado)
    {
        $user = User::find($idUser);
        $supermarket = Supermarket::find($idSupermercado);
        if ($user && $supermarket) {
            $userSupermarketList = ShoppingList::where('user_id', $user->id)
                ->where('supermarket_id', $supermarket->id)
                ->get();
            if ($userSupermarketList) {
                $response = [
                    'success' => True,
                    'message' => 'List found successfully',
                    'data' => $userSupermarketList
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'List not found',
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
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = ShoppingList::insertGetId($request->validate([
                'ingredients' => 'required|string',
                'user_id' => 'required|number',
                'supermarket_id' => 'required|number'

            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'ShoppingList has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'ShoppingList created successfully',
                'data' => ShoppingList::findOrFail($id)
            ];
            return response()->json($response);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $deletedShoppingList = ShoppingList::find($id);

            $shoppingList = $deletedShoppingList;
            $shoppingList->delete();
            $response = [
                'success' => true,
                'message' => 'ShoppingList was deleted',
                'data' => $deletedShoppingList
            ];
            return response()->json($response);

        } catch (Throwable $e) {
            report($e);
            $response = [
                'success' => false,
                'message' => 'ShoppingList has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        if ($shoppingList = ShoppingList::find($id)) {

            try {
                $shoppingList->update($request->validate([
                    'ingredients' => 'required|string',
                    'user_id' => 'required|number',
                    'supermarket_id' => 'required|number'
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'ShoppingList has not been updated, change the role name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $shoppingList->save();
            $response = [
                'success' => true,
                'message' => 'ShoppingList updated successfully',
                'data' => $shoppingList
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'ShoppingList not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }



    public function insertIngredient(Request $request)
    {
        if (!$request->has('user_id') || !$request->has('supermarket') || !$request->has('ingredient')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => 'oops'
            ];
            return response()->json($response);
        }
        $id = $request->input('user_id');
        $supermarket = $request->input('supermarket');
        $ingredient = $request->input('ingredient');
        $user = User::find($id);
        if ($user) {
            $selectedSupermarket = Supermarket::find($supermarket['id']);
            if ($selectedSupermarket != null) {
                $userSupermarketList = ShoppingList::where('user_id', $id)
                    ->where('supermarket_id', $selectedSupermarket['id'])
                    ->get();
                if ($userSupermarketList->isEmpty()) {
                    // echo $ingredient
                    $newSupermarketList = ShoppingList::create([
                        'user_id' => $id,
                        'supermarket_id' => $selectedSupermarket['id'],
                        'ingredients' => [$ingredient]
                    ]);

                    if ($newSupermarketList) {
                        $response = [
                            'success' => true,
                            'message' => 'ShoppingList has been created and ingredients were inserted',
                            'data' => $newSupermarketList
                        ];
                        return response()->json($response);
                    }
                    $response = [
                        'success' => false,
                        'message' => 'Something failed while creating the list',
                        'data' => null
                    ];
                    return response()->json($response);

                } else {
                    $ingredients = $userSupermarketList[0]->ingredients;
                    if (!in_array($ingredient, $ingredients)) {
                        $ingredients[] = $ingredient;
                        $userSupermarketList[0]->ingredients = $ingredients;

                        $userSupermarketList[0]->save();
                    }

                    $response = [
                        'success' => true,
                        'message' => 'Ingredients were inserted',
                        'data' => $userSupermarketList
                    ];
                    return response()->json($response);
                }



            }
            $response = [
                'success' => true,
                'message' => 'Supermarket not found',
                'data' => $selectedSupermarket
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
    public function deleteIngredient(Request $request, $userId, $supermarketID, $ingredientABorrar)
    {
        $user = User::find($userId);
        $supermarket = Supermarket::find($supermarketID);

        if ($user && $supermarket) {
            $userSupermarketList = ShoppingList::where('user_id', $user->id)
                ->where('supermarket_id', $supermarket->id)
                ->get();
            if ($userSupermarketList) {
                $ingredients = $userSupermarketList[0]->ingredients;

                // echo $ingredients;
                $posicioningredientABorrar = array_filter($ingredients, function ($ingredient) use ($ingredientABorrar) {
                    return $ingredient['id'] != $ingredientABorrar;
                });
                // echo $posicioningredientABorrar;
                // $lista->ingredients = json_encode(array_values($posicioningredientABorrar));
                $userSupermarketList[0]->ingredients = array_values($posicioningredientABorrar);
                $userSupermarketList[0]->save();

                $response = [
                    'success' => true,
                    'message' => 'Ingredient deleted successfully',
                    'data' => $userSupermarketList[0]
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'List not found',
                'data' => null
            ];
            return response()->json($response, 404);
        }

    }

    public function setBoughtTrue(Request $request)
    {
        if (!$request->has('userId') || !$request->has('supermarketId') || !$request->has('ingredient')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
        $id = $request->input('userId');
        $supermarket = $request->input('supermarketId');
        $ingredient = $request->input('ingredient');
        $user = User::find($id);
        $supermarket = Supermarket::find($supermarket);

        if ($user && $supermarket) {
            // echo $supermarket;
            // echo $user->id;
            $userSupermarketList = ShoppingList::where('user_id', $user->id)
                ->where('supermarket_id', $supermarket[0]->id)
                ->get();
            $ingredients = $userSupermarketList[0]->ingredients;
            foreach ($ingredients as &$item) {

                if ($item['name'] === $ingredient['name']) {
                    if ($item['isBought'] == 1) {
                        $item['isBought'] = 0;
                    } else {
                        $item['isBought'] = 1;
                    }

                    break;
                }
            }

            $userSupermarketList[0]->ingredients = $ingredients;
            $userSupermarketList[0]->save();


            $response = [
                'success' => true,
                'message' => 'Ingredient bought successfully',
                'data' => $userSupermarketList[0]
            ];
            return response()->json($response);
        }
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];
        return response()->json($response, 404);
    }
    public function editIngredient(Request $request)
    {
        "hola";
        if (!$request->has('userId') || !$request->has('supermarketId') || !$request->has('ingredient') || !$request->has('data')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
        $id = $request->input('userId');
        $supermarket = $request->input('supermarketId');
        $ingredient = $request->input('ingredient');
        $ingredientData = $request->input('data');
        $user = User::find($id);
        $supermarket = Supermarket::find($supermarket);

        if ($user && $supermarket) {
            // echo $supermarket;
            // echo $user->id;
            $userSupermarketList = ShoppingList::where('user_id', $user->id)
                ->where('supermarket_id', $supermarket[0]->id)
                ->get();
            $ingredients = $userSupermarketList[0]->ingredients;
            foreach ($ingredients as &$item) {

                if ($item['name'] === $ingredient['name']) {
                    $oldPrice = $item['price'];
                    $oldPriceK = $item['price_k'];
                    foreach ($ingredientData as $key => $value) {
                        if ($value !== null) {
                            $item[$key] = $value;
                            if ($item['price'] > $oldPrice || $item['price_k'] > $oldPriceK) {

                                $item['priceUp'] = true;
                            } else if ($item['price'] < $oldPrice || $item['price_k'] < $oldPriceK) {

                                $item['priceUp'] = false;
                            } else {

                                $item['priceUp'] = null;
                            }
                        }
                    }
                }
            }
            $userSupermarketList[0]->ingredients = $ingredients;
            $userSupermarketList[0]->save();

            $response = [
                'success' => true,
                'message' => 'Ingredient edited successfully',
                'data' => $userSupermarketList[0]
            ];
            return response()->json($response);
        }
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];
        return response()->json($response, 404);
    }
}
