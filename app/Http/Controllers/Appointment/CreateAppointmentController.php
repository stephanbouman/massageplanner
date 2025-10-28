<?php

namespace App\Http\Controllers\Appointment;

use App\Models\Client;
use App\Http\Resources\ClientResource;

class CreateAppointmentController
{
    public function __invoke(Client $client)
    {
        return inertia('Appointment/Create', [
            'client' => ClientResource::make($client),
        ]);
    }

}