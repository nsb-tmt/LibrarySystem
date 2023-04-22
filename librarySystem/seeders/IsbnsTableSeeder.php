<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsbnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('isbns')->insert([
            'isbn'=>'9784101152097',
            'title'=>'燃えよ剣 下',
            'author'=>'司馬遼太郎',
            'publisher'=>'新潮社',
            'price'=>'850',
            'img'=>'https://cover.openbd.jp/9784101152097.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('isbns')->insert([
            'isbn'=>'9784065278734',
            'title'=>'復刻版テレビマガジンデラックス　決定版　ウルトラセブン超百科',
            'author'=>'講談社',
            'publisher'=>'講談社',
            'price'=>'1500',
            'img'=>'https://cover.openbd.jp/9784065278734.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
