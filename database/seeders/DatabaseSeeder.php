<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        Category::create([
            'name' => 'Novel Horor',
            'slug' => 'novel-horor'
        ]);

        Category::create([
            'name' => 'Novel Romantis',
            'slug' => 'novel-romantis'
        ]);

        Category::create([
            'name' => 'Novel Komedi',
            'slug' => 'novel-komedi'
        ]);

        Category::create([
            'name' => 'Novel Sejarah',
            'slug' => 'novel-sejarah'
        ]);
        Post::factory(20)->create();
    }
}
