<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeagueCollection;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index(): LeagueCollection
    {
        $leagues = League::all();
        return LeagueCollection::make($leagues);
    }

    public function show(League $league): LeagueResource
    {
        return LeagueResource::make($league);
    }

    public function create(Request $request)
    {
        $league = League::create([
            'name' => $request->input('data.attributes.name'),
            'public_name' => $request->input('data.attributes.public_name'),
            'is_active' => $request->input('data.attributes.is_active')
        ]);

        return LeagueResource::make($league);
    }
}
