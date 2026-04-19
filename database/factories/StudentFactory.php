<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'nim' => fake()->unique()->numerify('12022#####'),
            'major' => fake()->randomElement(['Information Systems', 'Informatics', 'Computer Science', 'Data Science']),
        ];
    }
}
