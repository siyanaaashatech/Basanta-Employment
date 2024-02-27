<?php

namespace Database\Factories;

use App\Models\BlogPostsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostsCategoryFactory extends Factory
{
    protected $model = BlogPostsCategory::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image' => 'uploads/blogpostcategory/pexels-photo-1258865.jpeg',
            'content' => $this->faker->paragraph,
        ];
    }
}
