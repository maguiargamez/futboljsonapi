<?php

namespace Tests\Feature\Leagues;

use App\Models\League;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLeagueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_leagues()
    {
        $this->withoutExceptionHandling();  
        $response = $this->postJson(route('api.v1.leagues.create'),[
            'data' => [
                'type' => 'leagues',
                'attributes' => [
                    'name' => 'New League 001',
                    'public_name' => 'New League',
                    'is_active' => true
                ]
            ]
        ]);

        $response->assertStatus(201);
        $league = League::first();
        $response->assertHeader(
            'Location',
            route('api.v1.leagues.show', $league)
        );

        $response->assertExactJson([
            'data' => [
                'type' => 'leagues',
                'id' => (string) $league->getRouteKey(),
                'attributes' => [
                    'name' => 'New League 001',
                    'public_name' => 'New League',
                    'is_active' => true
                ],
                'links' => [
                    'self' => route('api.v1.leagues.show', $league)
                ]
            ]
        ]);
    }
}
