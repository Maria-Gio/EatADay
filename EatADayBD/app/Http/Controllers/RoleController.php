<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use TheSeer\Tokenizer\Exception;
use Throwable;

class RoleController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $roles = Role::all();
        } catch (Throwable $e) {
            return response('Any role found', 200);
        }

        $response = [];

        if (isset($roles[0])) {
            $response = [
                'success' => true,
                'message' => "Roles fetched successfully",
                'data' => $roles
            ];

            return response()->json($response, 200);
        } else {

            $response = [
                'success' => false,
                'message' => "No roles found",
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = Role::insertGetId($request->validate([
                'rol' => 'required|string|unique:roles'
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Role has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'Role created successfully',
                'data' => Role::findOrFail($id)
            ];
            return response()->json($response, 200);
        }


    }
    public function delete(Request $request, $id)
    {
        try {
            $deletedRole = Role::find($id);

            $role = $deletedRole;
            $role->delete();
            $response = [
                'success' => true,
                'message' => 'Role was deleted',
                'data' => $deletedRole
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Role has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function update(Request $request, $id)
    {
        if ($role = Role::find($id)) {

            try {
                $role->update($request->validate([
                    'role' => 'string',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Role has not been updated, change the role name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $role->save();
            $response = [
                'success' => true,
                'message' => 'Role updated successfully',
                'data' => $role
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Role not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function getById(Request $request, $id)
    {
        $role = Role::find($id);
        if ($role != null) {
            $response = [
                'success' => true,
                'message' => 'Role found successfully',
                'data' => $role
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Role not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);

    }

    public function users(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        if ($role) {

            if ($role != null && $role->user) {
                $response = [
                    'success' => true,
                    'message' => 'Users found successfully',
                    'data' => $role->user
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
                'message' => 'Role not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
}
