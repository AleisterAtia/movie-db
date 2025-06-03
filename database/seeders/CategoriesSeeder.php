<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            'category_name' => 'Action',
            'description' => 'Action movies',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'category_name' => 'Comedy',
                'description' => 'film lucu yang penuh dengan kekocakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Drama',
                'description' => 'film yang menceritakan tentang kehidupan manusia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sci-Fi',
                'description' => 'film yang menceritakan tentang dunia yang tak terlihat oleh mata manusia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Romance',
                'description' => 'film yang menceritakan tentang cinta',
                'created_at' => now(),
                'updated_at' => now(),
                ],
        ]);
    }
}
