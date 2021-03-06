<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Hash;
use Validator;
use Redirect;

class UserController extends Controller
{
  
    public function show($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            return view('pages.user', compact(['user']));
        } else {
            abort(404);
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
            return Redirect::back()->withInput($request->all())->withErrors($validator);
        }

        $user = User::find($request->id);

        if (Hash::check($request->password, $user->password)) {
            $new_comment = new Comment;
            $new_comment->user_id = $request->id;
            $new_comment->comment_description = $request->comment;
            if ($new_comment->save()) {
                return Redirect::back()->with('success', 'Add comment successful');
                ;
            } else {
                return Redirect::back()->withInput($request->all())->withErrors('Add comment not successful');
            };
        } else {
            return Redirect::back()->withInput($request->all())->withErrors('Password not match.');
        }
    }
}
