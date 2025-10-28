<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;

class ShowClientController extends Controller
{
    public function __invoke(Client $client)
    {
        return inertia('Client/Show', [
            'client' => ClientResource::make($client),
            'appointments' => AppointmentResource::collection($client->appointments),
        ]);
    }
}
