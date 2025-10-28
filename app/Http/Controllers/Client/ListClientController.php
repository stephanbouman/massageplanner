<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientOverviewResource;
use App\Models\Client;

class ListClientController extends Controller
{
    public function __invoke()
    {
        $clients = Client::query()->orderBy('last_name')->get();

        return inertia('Client/Index', [
            'clients' => ClientOverviewResource::collection($clients),
        ]);
    }
}
