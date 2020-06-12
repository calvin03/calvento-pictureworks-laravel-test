<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Hash;
use Validator;
use Redirect;
use Illuminate\Http\Response;

class ApiUserController extends Controller
{
    public function show($id)
    {
        $user = User::with('comments')->where(['id' => $id])->first();
        if (isset($user)) {
            return response()->json(json_encode($user), 200);
        } else {
            return response()->json("No User Found", 404);
        }
    }
    public function addComment(Request $request)
    {
        $rules = array(
            'id' => 'required|exists:users,id',
            'password' => 'required',
            'comment' => 'required',
    );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $user = User::find($request->id);

        if (Hash::check($request->password, $user->password)) {
            $new_comment = new Comment;
            $new_comment->user_id = $request->id;
            $new_comment->comment_description = $request->comment;
            if ($new_comment->save()) {
                return response()->json('Add comment successful', 200);
            } else {
                return response()->json('Add comment not successful', 500);
            };
        } else {
            return response()->json('Password Not Match', 401);
        }
    }
}
