<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Throwable;

class CommentController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $comments = Comment::all();
        } catch (Throwable $e) {
            return response('Any comment found', 200);
        }

        $response = [];

        if (isset($comments[0])) {
            $response = [
                'success' => true,
                'message' => "Comments fetched successfully",
                'data' => $comments
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
        $comment = Comment::find($id);
        if ($comment != null) {
            $response = [
                'success' => true,
                'message' => 'Comment found successfully',
                'data' => $comment
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Comment not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);

    }
    public function create(Request $request)
    {
        $id = null;
        try {
            // $id = Comment::insertGetId($request->validate([
                $id = Comment::create($request->validate([
                'title' => 'required|string',
                'text' => 'required|string|unique:comments',
                'user_id'=>'required|numeric',
                'isChecked' => 'required|boolean'
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Comment has not been created, some data may be missing',
                'data' => $id
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'Comment created successfully',
                'data' => Comment::findOrFail($id)
            ];
            return response()->json($response, 200);
        }




    }
    public function delete(Request $request, $id)
    {
        try {
            $deletedComment = Comment::find($id);

            $comment = $deletedComment;
            $comment->delete();
            $response = [
                'success' => true,
                'message' => 'Comment was deleted',
                'data' => $deletedComment
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Comment has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function update(Request $request, $id)
    {


        if ($comment = Comment::find($id)) {

            try {
                $comment->update($request->validate([
                    'title' => 'string',
                    'text' => 'string|unique:comments',
                    'isFrequent' => 'boolean',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Comment has not been updated, change the text please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $comment->save();
            $response = [
                'success' => true,
                'message' => 'Comment updated successfully',
                'data' => $comment
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Comment not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function user(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment) {

            if ($comment != null && $comment->user) {
                $response = [
                    'success' => true,
                    'message' => 'Users found successfully',
                    'data' => $comment->user
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
                'message' => 'Comment not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }

}
