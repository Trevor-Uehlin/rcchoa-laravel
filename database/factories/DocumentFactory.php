<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 5,
            'name' => $this->faker->name(),
            'title' => "Random Title",
            'description' => "This is the description",
            'category' => "Test",
            'filepath' => "documents/test/filepath"
        ];
    }
}
