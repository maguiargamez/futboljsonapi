<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Match;
use App\Models\MatchGoal;
use App\Models\Player;

class MatchGoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MatchGoal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'match_id' => Match::factory(),
            'player_id' => Player::factory(),
            'player_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'number' => $this->faker->numberBetween(-10000, 10000),
            'position' => $this->faker->randomLetter,
            'minute' => $this->faker->numberBetween(-10000, 10000),
            'is_penalty' => $this->faker->boolean,
            'penalty_shoots' => $this->faker->boolean,
        ];
    }
}
