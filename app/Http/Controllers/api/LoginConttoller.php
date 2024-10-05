<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginConttoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function check(Request $request)
    {
        //
        $user = $request->only("name", "password");
        if (Auth::attempt($user)) {
            $token = $request->user()->createToken("token");
            return response()->json(["user" => $request->user(), "token" => $token->plainTextToken]);
            return response()->json("aaa");
        }
        return response()->json("名前かパスワードが間違っています");
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();
        $request->session()->regenerate();
        return true;
    }
}
