<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AwayTeam;
use App\Models\HomeTeam;
use App\Models\Match;
use App\Models\Tournament;

class MatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Match::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tournament_id' => Tournament::factory(),
            'home_team_id' => HomeTeam::factory(),
            'home_team' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'away_team_id' => AwayTeam::factory(),
            'away_team' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'score' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
