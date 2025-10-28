<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class UpdateAppointmentController extends Controller
{
    public function __invoke(Request $request, Client $client, Appointment $appointment)
    {

        $request->validate([
            'date' => ['required', 'date'],
            'type' => ['required', 'string'],
            'duration' => ['nullable', 'integer'],
            'additional_info' => ['nullable', 'string'],
        ]);

        $appointment->date = $request->date('date');
        $appointment->type = $request->type;
        $appointment->expected_duration = $request->duration;
        $appointment->additional_info = $request->additional_info;
        $appointment->save();

        return to_route('appointment.show', [$client, $appointment]);
    }
}
