<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Team;
use App\Models\Tournament;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tournament_id' => Tournament::factory(),
            'name' => $this->faker->name,
            'public_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'short_code' => $this->faker->randomLetter,
            'logo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'owner' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'owner_email' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'owner_phone' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'about' => $this->faker->text,
            'archive_team' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
