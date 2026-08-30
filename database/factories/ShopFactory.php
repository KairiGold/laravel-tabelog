<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $low = $this->faker->randomElement([500, 1000, 2000, 3000, 5000]);

        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'name' => $this->faker->company().' 名古屋店',
            'image' => null,
            'description' => $this->faker->realText(120),
            'postal_code' => $this->faker->numerify('###-####'),
            'address' => '愛知県名古屋市'.$this->faker->city().$this->faker->streetAddress(),
            'phone_number' => $this->faker->numerify('052-###-####'),
            'low_price' => $low,
            'high_price' => $low + $this->faker->randomElement([1000, 2000, 3000, 5000]),
            'opening_time' => '11:00:00',
            'closing_time' => '22:00:00',
            'seating_capacity' => $this->faker->numberBetween(10, 60),
        ];
    }
}
