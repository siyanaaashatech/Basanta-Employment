<?php

namespace Database\Seeders;

use App\Models\BlogPostsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogPostsCategory::factory()->count(10)->create();
    }
}
