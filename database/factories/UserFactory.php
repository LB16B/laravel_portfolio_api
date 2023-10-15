<?php

namespace Database\Factories;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileImageProvider extends Base
{
    protected static $profile_image = [
        'profile1.jpg',
        'profile2.jpg',
        'profile3.jpg',
        'profile4.jpg',
        'profile5.jpg',
        'profile6.jpg',
        'profile7.jpg',
        'profile8.jpg',
        'profile9.jpg',
        'profile10.jpg',
        'profile11.jpg',
        'profile12.jpg',
        'profile13.jpg',
        'profile14.jpg',
        'profile15.jpg',
        'profile16.jpg',
        'profile17.jpg',
        'profile18.jpg',
        'profile19.jpg',
        'profile20.jpg',
        'profile21.jpg',
        'profile22.jpg',
    ];

    public static function profile_image()
    {
        return static::randomElement(static::$profile_image);
    }
}



class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new ProfileImageProvider($this->faker));

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            'filename' => ProfileImageProvider::profile_image(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
