<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Blogs::create([
                'title' => 'Blog Title ' . $i,
                'content' => 'This is the content of blog number ' . $i,
                'author_id' => 1,
                'image' => json_encode(['url' => 'https://example.com/image' . $i . '.jpg']),
                'excerpt' => 'This is an excerpt for blog number ' . $i,
                'slug' => 'blog-title-' . $i,
                'category' => 'kegiatan',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
