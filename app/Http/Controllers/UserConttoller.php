<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserConttoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::get();
        return view("dashboard", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("user_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "admin" => false,
            "permission" => true,
            "memo" => $request->memo,
            "password" => Hash::make($request->password)
        ]);
        return redirect(route("user_create"))->with(["message" => "ユーザーを作成しました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        return view("user_edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "memo" => $request->memo,
            "permission" => $request->permission == 1 ? 1 : 0
        ]);
        return redirect(route("user_edit", ["id" => $user->id]))->with(["message" => "編集が完了しました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect(route("dashboard"));
    }
}
