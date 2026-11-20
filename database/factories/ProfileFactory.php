<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'headline' => fake()->jobTitle(),
            'tagline' => fake()->sentence(),
            'about' => fake()->paragraph(),
            'location' => fake()->city().', Indonesia',
            'email' => fake()->safeEmail(),
            'avatar_url' => null,
            'skills' => ['Komunikasi', 'Kreativitas'],
            'projects' => [
                [
                    'category' => 'Proyek contoh',
                    'title' => 'Proyek pertamamu',
                    'description' => 'Tambahkan deskripsi proyek di database.',
                    'url' => null,
                ],
            ],
            'social_links' => [],
        ];
    }
}
