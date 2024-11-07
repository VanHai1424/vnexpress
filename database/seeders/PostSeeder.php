<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            1 => 2, 
            2 => 2, 
            3 => 3,
            4 => 4,
            5 => 4,
            6 => 5 
        ];
    
        foreach ($categories as $categoryId => $count) {
            for ($i = 0; $i < $count; $i++) {
                Post::create([
                    'title' => fake()->sentence(),
                    'desc' => fake()->paragraph(),
                    'poster' => fake()->imageUrl(),
                    'content' => fake()->text(500),
                    'category_id' => $categoryId,
                ]);
            }
        }
    }
}
