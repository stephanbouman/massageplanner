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
        $appointments = $client->appointments()
            ->where('date', '>', now()->subDay())
            ->orderBy('date')
            ->get();

        return inertia('Client/Show', [
            'client' => ClientResource::make($client),
            'appointments' => AppointmentResource::collection($appointments),
        ]);
    }
}
