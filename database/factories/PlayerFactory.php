<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Player;
use App\Models\Team;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_id' => Team::factory(),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date(),
            'sex' => $this->faker->boolean,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'number' => $this->faker->numberBetween(-10000, 10000),
            'position' => $this->faker->randomLetter,
            'is_active' => $this->faker->boolean,
        ];
    }
}
