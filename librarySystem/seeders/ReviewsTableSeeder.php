<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'isbn_id'=>'1',
            'user_id'=>'1',
            'review'=>'やばい',
            'score'=>'3',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'isbn_id'=>'2',
            'user_id'=>'1',
            'review'=>'ウルトラ',
            'score'=>'4',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'isbn_id'=>'1',
            'user_id'=>'2',
            'review'=>'いいね',
            'score'=>'4',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'isbn_id'=>'1',
            'user_id'=>'3',
            'review'=>'すごいね',
            'score'=>'5',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'isbn_id'=>'2',
            'user_id'=>'3',
            'review'=>'やばいウルトラ',
            'score'=>'4',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
