<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guest'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
