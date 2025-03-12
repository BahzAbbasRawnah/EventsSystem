<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_en' => $this->faker->country,
            'name_ar' => $this->faker->country,
            'code' => $this->faker->unique()->countryCode,
            'flage' => $this->faker->unique()->countryCode,
        ];
    }
}
