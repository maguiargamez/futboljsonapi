<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LeagueCollection extends ResourceCollection
{
    // public collects = LeaguessResource::class; //En caso de no usar la convencion de nombre LeaguesResource y tener otro nombre
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => route('api.v1.leagues.index')
            ]
        ];
    }
}
