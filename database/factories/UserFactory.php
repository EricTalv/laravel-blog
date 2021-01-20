<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $slug = str_slug($name, '-');

        return [
            'name' => $name,
            'slug' => $slug,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => $this->faker->password,
            'remember_token' => $this->faker->lexify('??????????'),
        ];
    }
}
