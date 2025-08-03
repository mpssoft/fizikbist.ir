<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        $title = $this->faker->sentence(3);
        $price = $this->faker->numberBetween(100000, 1000000);
        $discount = $this->faker->boolean(50) ? $this->faker->numberBetween(50000, $price - 1000) : 0;

        return [
            'title' => $title,
            'price' => $price,
            'discount_price' => $discount,
            'discount_expires_at' => $discount > 0 ? now()->addDays(rand(1, 10)) : null,
            'description' => $this->faker->paragraph(),
            'cover_image' => null, // You can set a default image path if needed
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'teacher_id' => User::factory(), // assumes users table has teachers
        ];
    }
}
