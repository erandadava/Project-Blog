<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence, //generate fake sentence
            'body' => $this->faker->paragraph(30), //generate fake paragraph
            'user_id' => User::factory(), ////Generates a User from factory and extracts id
        ];
    }
}
