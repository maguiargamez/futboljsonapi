<?php

namespace Tests\Feature\Leagues;

use App\Models\League;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListLeaguesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_fetch_a_single_league()
    {
        $this->withoutExceptionHandling();
        $league = League::factory()->create();

        $response = $this->getJson(route('api.v1.leagues.show', $league));
        $response->assertJson([
            'data' => [
                'type' => 'leagues',
                'id' => (string) $league->getRouteKey(),
                'attributes' => [
                    'name' => $league->name,
                    'public_name' => $league->public_name,
                    'is_active' => $league->is_active,
                ],
                'links' => [
                    'self' => route('api.v1.leagues.show', $league)
                ]
            ]
        ]);
    }

    /** @test */
    public function can_fetch_all_leagues()
    {
        $this->withoutExceptionHandling();        
        $leagues = League::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.leagues.index'));

        $response->assertExactJson([
            'data' => [
                [
                    'type' => 'leagues',
                    'id' => (string) $leagues[0]->getRouteKey(),
                    'attributes' => [
                        'name' => $leagues[0]->name,
                        'public_name' => $leagues[0]->public_name,
                        'is_active' => $leagues[0]->is_active,
                    ],
                    'links' => [
                        'self' => route('api.v1.leagues.show', $leagues[0])
                    ]
                ],
                [
                    'type' => 'leagues',
                    'id' => (string) $leagues[1]->getRouteKey(),
                    'attributes' => [
                        'name' => $leagues[1]->name,
                        'public_name' => $leagues[1]->public_name,
                        'is_active' => $leagues[1]->is_active,
                    ],
                    'links' => [
                        'self' => route('api.v1.leagues.show', $leagues[1])
                    ]
                ],
                [
                    'type' => 'leagues',
                    'id' => (string) $leagues[2]->getRouteKey(),
                    'attributes' => [
                        'name' => $leagues[2]->name,
                        'public_name' => $leagues[2]->public_name,
                        'is_active' => $leagues[2]->is_active,
                    ],
                    'links' => [
                        'self' => route('api.v1.leagues.show', $leagues[2])
                    ]
                ]
            ],
            'links' => [
                'self' => route('api.v1.leagues.index')
            ]
        ]);
    }

}
