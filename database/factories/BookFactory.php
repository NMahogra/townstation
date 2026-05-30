<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
#[UseModel(Book::class)]
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => $this->faker->sentence(),
        'author' => $this->faker->name(),
        'price' => $this->faker->randomFloat(2, 5, 50),
    ];
    }
}
