<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;
use Throwable;


class RecommendationController extends Controller
{
    public function getAll(Request $request)
    {

        try {
            $recommendations = Recommendation::all();
        } catch (Throwable $e) {
            return response('Any recommendations found', 200);
        }

        $response = [];

        if (isset($recommendations[0])) {
            $response = [
                'success' => true,
                'message' => "Recommendation fetched successfully",
                'data' => $recommendations
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "No recommendations found",
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }

    public function getById(Request $request, $id)
    {

        $recommendations = Recommendation::find($id);
        if ($recommendations != null) {
            $response = [
                'success' => true,
                'message' => 'Recommendation found successfully',
                'data' => $recommendations
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Recommendation not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);

    }

    public function create(Request $request)
    {
        $id = null;
        try {
            $id = Recommendation::insertGetId($request->validate([
                'title' => 'required|string',
                'text' => 'required|string',
                'photo' => 'required|string',
                'video' => 'required|string'
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Recommendation has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'Recommendation created successfully',
                'data' => Recommendation::findOrFail($id)
            ];
            return response()->json($response, 200);
        }

    }



    public function delete(Request $request, $id)
    {

        try {
            $deletedRecommendation = Recommendation::find($id);

            $recommendations = $deletedRecommendation;
            $recommendations->delete();
            $response = [
                'success' => true,

                'message' => 'Recommendation was deleted',
                'data' => $deletedRecommendation
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Recommendation has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }

    public function modify(Request $request, $id)
    {


        if ($recommendations = Recommendation::find($id)) {

            try {
                $recommendations->update($request->validate([
                    'title' => 'string',
                    'text' => 'string',
                    'photo' => 'string',
                    'video' => 'string'
                ]));
            } catch (Throwable $a) {
                report($a);

                $response = [
                    'success' => false,
                    'message' => 'Error al modificar la Recommendation',
                    'data' => null
                ];
                return response()->json($response);
            }
            $recommendations->save();
            $response = [
                'success' => true,
                'message' => 'Recommendation modificada con exito',
                'data' => $recommendations
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Recommendation no encontrada',
                'data' => null
            ];
            return response()->json($response);
        }

    }
}
