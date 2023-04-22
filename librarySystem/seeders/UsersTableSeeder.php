<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user'=>'user1',
            'password'=>'userpsss1',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'user'=>'user2',
            'password'=>'userpsss2',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'user'=>'user3',
            'password'=>'userpsss3',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
