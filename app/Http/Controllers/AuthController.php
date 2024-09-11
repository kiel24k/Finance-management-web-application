<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->date_of_birth = $request->date_of_birth;
        $user->country = $request->country;
        $user->role = 'client';
        $user->tel_no = $request->tel_no;
        $user->save();
        return response()->json($user);
    }
}
