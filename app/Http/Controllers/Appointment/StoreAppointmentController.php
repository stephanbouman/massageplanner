<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class StoreAppointmentController extends Controller
{
    public function __invoke(Request $request, Client $client)
    {

        $request->validate([
            'date' => ['required', 'date'],
            'type' => ['required', 'string'],
            'duration' => ['nullable', 'integer'],
            'additional_info' => ['nullable', 'string'],
        ]);

        $appointment = new Appointment;
        $appointment->date = $request->date('date');
        $appointment->type = $request->type;
        $appointment->expected_duration = $request->duration;
        $appointment->additional_info = $request->additional_info;
        $client->appointments()->save($appointment);

        return to_route('clients.show', $client);
    }
}
