<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')
            ->insert([
                'login'=>'Mishanya',
                'password'=>123
            ]);

        DB::table('categories')
            ->insert([
                [
                    'name_of_category'=>'Спорт'
                ],
                [
                    'name_of_category'=>'Природа'
                ],
                [
                    'name_of_category'=>'Образование'
                ]
            ]);

        DB::table('news')
            ->insert([
                [
                    'header'=>\Illuminate\Support\Str::random(20),
                    'information'=>\Illuminate\Support\Str::random(200),
                    'date'=>date('Y-m-d'),
                    'id_categories'=>1
                ],
                [
                    'header'=>\Illuminate\Support\Str::random(20),
                    'information'=>\Illuminate\Support\Str::random(200),
                    'date'=>date('Y-m-d'),
                    'id_categories'=>2
                ],
                [
                    'header'=>\Illuminate\Support\Str::random(20),
                    'information'=>\Illuminate\Support\Str::random(200),
                    'date'=>date('Y-m-d'),
                    'id_categories'=>3
                ]
            ]);
    }
}
