<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserConttoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::select("name", "memo", "created_at")->get();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "admin" => false,
            "permission" => true,
            "memo" => $request->memo,
            "password" => Hash::make($request->password)
        ]);
        return response()->json(["user" => $user, "message" => "アカウント作成が完了しました"]);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'memo' => 'nullable|string|max:255',
        ]);
        $user = User::find($request->user()->id);
        $user->update([
            "name" => $request->name,
            "memo" => $request->memo
        ]);
        return response()->json([$user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $user = User::find($request->user()->id);
        $user->delete();
        return response()->json("削除が完了しました");
    }
}
