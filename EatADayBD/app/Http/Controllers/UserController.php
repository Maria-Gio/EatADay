<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;



class UserController extends Controller
{
    //

    public function getAll(Request $request)
    {

        try {
            $users = User::all();
        } catch (Throwable $e) {
            return response('Any users found', 200);
        }

        $response = [];

        if (isset($users[0])) {
            $response = [
                'success' => true,
                'message' => "User fetched successfully",
                'data' => $users
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "No comments found",
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }

    public function getById(Request $request, $id)
    {

        $user = User::find($id);
        if ($user != null) {
            $response = [
                'success' => true,
                'message' => 'User found successfully',
                'data' => $user
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'User not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);

    }

    public function create(Request $request)
    {
        $id = null;
        try {
            $id = User::insertGetId($request->validate([
                'name' => 'required|string',
                'mail' => 'required|string|unique:users',
                'password' => 'required|string',
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'User has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'User created successfully',
                'data' => User::findOrFail($id)
            ];
            return response()->json($response, 200);
        }

    }



    public function delete(Request $request, $id)
    {

        try {
            $deletedUser = User::find($id);

            $user = $deletedUser;
            $user->delete();
            $response = [
                'success' => true,

                'message' => 'User was deleted',
                'data' => $deletedUser
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'User has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }

    public function modify(Request $request, $id)
    {


        if ($user = User::find($id)) {

            try {
                $user->update($request->validate([
                    'name' => 'string',
                    'email' => 'string',
                    'password' => 'string',
                    'role_id' => 'string'
                ]));
            } catch (Throwable $a) {
                report($a);

                $response = [
                    'success' => false,
                    'message' => 'Error al modificar el Usuario',
                    'data' => null
                ];
                return response()->json($response);
            }
            $user->save();
            $response = [
                'success' => true,
                'message' => 'Usuario modificado con exito',
                'data' => $user
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Usuario no encontrado',
                'data' => null
            ];
            return response()->json($response);
        }

    }


    public function ingredients(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {

            if ($user != null && $user->ingredient) {
                $response = [
                    'success' => true,
                    'message' => 'Ingredients found successfully',
                    'data' => $user->ingredients
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
                'message' => 'User not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
    public function role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {

            if ($user != null && $user->role) {
                $response = [
                    'success' => true,
                    'message' => 'Role found successfully',
                    'data' => $user->role
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Role not found',
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


    public function recipes(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            if ($user != null && $user->recipe) {
                $response = [
                    'success' => true,
                    'message' => 'User with recipe found successfully',
                    'data' => $user->recipe
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
                'message' => 'User not found',
                'data' => null
            ];
        }



        return response()->json($response, 200);
    }

    public function getUserID($id) {
        $user = User::find($id);
        if ($user != null) {
            $response = [
                'success' => true,
                'message' => 'User ID found successfully',
                'data' => $id
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'User not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);
    }


}



