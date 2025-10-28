<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Inertia\Response;

class ListAppointmentController extends Controller
{
    public function __invoke(): Response
    {
        $appointments = Appointment::query()
            ->orderBy('date')
            ->with('client');

        if (request()->boolean('showAll') === false) {
            $appointments->where('date', '>', now()->subDay());
        }

        return inertia('Appointment/Index', [
            'appointments' => AppointmentResource::collection($appointments->get()),
        ]);
    }
}
