<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;

class ListAppointmentController extends Controller
{
    public function __invoke()
    {

        $appointments = Appointment::query()->orderBy('date')->with('client')->get();

        return inertia('Appointment/Index', [
            'appointments' => AppointmentResource::collection($appointments),
        ]);
    }
}
