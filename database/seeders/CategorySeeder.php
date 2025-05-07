<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Action',
                'description' => 'Hidup Jokowi!!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Comedy',
                'description' => 'Comedy movies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Drama',
                'description' => 'Drama movies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sci-Fi',
                'description' => 'Sci-Fi movies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Romance',
                'description' => 'lorem',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
