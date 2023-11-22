<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Typefinantial;

class TypefinantialFactory extends Factory
{
    protected $model = Typefinantial::class;

    public function definition()
    {
        return [
            'description' => fake()->name(), 
        ];
    }
}