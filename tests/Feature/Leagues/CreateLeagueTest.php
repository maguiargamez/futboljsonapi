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

    /** @test */
    public function name_is_required()
    {
        //$this->withoutExceptionHandling();  
        $response = $this->postJson(route('api.v1.leagues.create'),[
            'data' => [
                'type' => 'leagues',
                'attributes' => [
                    /*'name' => 'New League 001',*/
                    'public_name' => 'New League',
                    'is_active' => true
                ]
            ]
        ])->dump();

        $response->assertJsonStructure([
            'errors' => [
                [
                    'title',
                    'detail',
                    'source' => [
                        'pointer'
                    ]
                ]
            ]
        ]);
        //$response->assertJsonValidationErrors('data.attributes.name');

    }

    /** @test */
    public function name_must_be_at_least_4_characters()
    {
        //$this->withoutExceptionHandling();  
        $response = $this->postJson(route('api.v1.leagues.create'),[
            'data' => [
                'type' => 'leagues',
                'attributes' => [
                    'name' => 'ABC',
                    'public_name' => 'New League',
                    'is_active' => true
                ]
            ]
        ])->dump();

        $response->assertJsonValidationErrors('data.attributes.name');

    }

    /** @test */
    public function public_name_is_required()
    {
        //$this->withoutExceptionHandling();  
        $response = $this->postJson(route('api.v1.leagues.create'),[
            'data' => [
                'type' => 'leagues',
                'attributes' => [
                    'name' => 'New League 001',
                    /*'public_name' => 'New League',*/
                    'is_active' => true
                ]
            ]
        ])->dump();

        $response->assertJsonValidationErrors('data.attributes.public_name');

    }

        /** @test */
        public function is_active_is_required()
        {
            //$this->withoutExceptionHandling();  
            $response = $this->postJson(route('api.v1.leagues.create'),[
                'data' => [
                    'type' => 'leagues',
                    'attributes' => [
                        'name' => 'New League 001',
                        'public_name' => 'New League',
                        /*'is_active' => true*/
                    ]
                ]
            ])->dump();
    
            $response->assertJsonValidationErrors('data.attributes.is_active');
    
        }

}
