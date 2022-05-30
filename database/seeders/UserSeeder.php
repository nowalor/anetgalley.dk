<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'nikulasoskarsson@gmail.com')->get()->first();


        !$user && User::create([
            'name' => 'Nikulás Óskarsson',
            'email' => 'nikulasoskarsson@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@Password091'),
            'is_admin' => true,
        ]);
    }
}
