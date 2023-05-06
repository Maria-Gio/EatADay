<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;


class SupermarketController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $supermarkets = Supermarket::all();
            $response = [
                'success' => true,
                'message' => "Supermercados obtenidos",
                'data' => $supermarkets
            ];
            return response()->json($response);
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Failed to create Supermarket',
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }


    public function create(Request $request)
    {
        $id = null;
        try {
            $id = Supermarket::insertGetId($request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'photo' => 'required|string',
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Failed to create Supermarket',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'Supermarket created successfully',
                'data' => Supermarket::findOrFail($id)
            ];
            return response()->json($response, 200);
        }
    }


    public function delete(Request $request, $id)
    {
        try {
            $deletedSupermarket = Supermarket::find($id);

            $supermarket = $deletedSupermarket;
            $supermarket->delete();
            $response = [
                'success' => true,
                'message' => 'Supermarket was deleted',
                'data' => $deletedSupermarket
            ];
            return response()->json($response, 200);
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Supermarket not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }

    public function getById(Request $request, $id)
    {

        $supermarket = Supermarket::find($id);

        if ($supermarket != null) {
            $response = [
                'success' => true,
                'message' => 'Supermarket found successfully',
                'data' => $supermarket
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Supermarket not found',
                'data' => null
            ];
        }

        return response()->json($response);
    }

    public function modify(Request $request, $id)
    {

        if ($supermarket = Supermarket::find($id)) {

            try {
                $supermarket->update($request->validate([
                    'name' => 'required|string',
                    'description' => 'required|string',
                    'photo' => 'required|string',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Supermarket failed to modify',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $supermarket->save();
            $response = [
                'success' => true,
                'message' => 'Supermarket modified successfully',
                'data' => $supermarket
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Supermarket not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }

    public function ingredients(Request $request, $id)
    {
        $supermarket = Supermarket::findOrFail($id);
        if ($supermarket) {

            if ($supermarket != null && $supermarket->ingredient) {
                $response = [
                    'success' => true,
                    'message' => 'Ingredients found successfully',
                    'data' => $supermarket->ingredients
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Ingredients not found',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Supermarket not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
}
