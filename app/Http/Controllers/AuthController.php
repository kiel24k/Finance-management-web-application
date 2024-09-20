<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email|email',
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'invalid credentials'
            ]);
        } else {
            $user = Auth::user();
            $token = $user->createToken('TokenName')->plainTextToken;
            return response()->json([
                'message' => 'login successfull'
            ])->cookie('user_token', $token, 24 * 6 * 7, null, null, true, true);
        }
    }

    public function user()
    {
        $user = Auth::user();
        return response()->json($user);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('user_token'));
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
