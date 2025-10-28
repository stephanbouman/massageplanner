<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ClientResource;
use App\Models\Appointment;
use App\Models\Client;

class ShowAppointmentController extends Controller
{
    public function __invoke(Client $client, Appointment $appointment)
    {
        return inertia('Appointment/Show', [
            'client' => ClientResource::make($client),
            'appointment' => AppointmentResource::make($appointment),
        ]);
    }
}
