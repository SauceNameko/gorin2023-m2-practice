<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "name" => "gorin",
            "email" => "aaa@gmail.com",
            "admin" => true,
            "permission" => true,
            "memo" => "admin",
            "password" => Hash::make("gorin")
        ]);
    }
}
