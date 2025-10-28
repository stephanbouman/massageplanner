<?php

namespace App\Http\Controllers\Appointment;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreAppointmentController extends Controller
{
    public function __invoke(Request $request, Client $client)
    {

        $request->validate([
            'date' => ['required', 'date'],
            'type' => ['required','string'],
        ]);

        $appointment = new Appointment();
        $appointment->date = $request->date('date');
        $appointment->type = $request->type;
        $client->appointments()->save($appointment);

        return to_route('clients.show', $client);
    }
}
