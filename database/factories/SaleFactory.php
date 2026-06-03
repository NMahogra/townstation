<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $book = Book::inRandomOrder()->first() ?? Book::factory()->create();
        $quantity = $this->faker->numberBetween(1, 5);
        $totalPrice = $book->price * $quantity;

        return [
            'book_id' => $book->id,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ];
    }
}
