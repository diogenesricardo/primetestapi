<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function listAll()
    {
        //Get all users
        $users = User::get();

        // Return a collection of $users with pagination
        return response(UserResource::collection($users),200);
    }

    public function show($id)
    {
        // Show only user
        return User::find($id);
    }

    public function destroy($id)
    {
        //Delete an user by id
        $user = User::findOrfail($id);
        if ($user->delete()) {
            return response(new UserResource($user),204);
        }

    }

    public function store(Request $request)
    {
        //Save a new user or update an existent
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->isMethod('post')) {
            $user->password = bcrypt('secret');
        }

        if ($user->save()) {
            return response(new UserResource($user),201);
        }
    }
}
