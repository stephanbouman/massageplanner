<?php

namespace App\Http\Controllers\Appointment;

use App\Enums\MassageType;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ClientResource;
use App\Models\Appointment;
use App\Models\Client;
use IFresh\EnumTranslations\EnumTranslatorFacade as EnumTranslator;

class EditAppointmentController extends Controller
{
    public function __invoke(Client $client, Appointment $appointment)
    {
        return inertia('ClientAppointment/Edit', [
            'client' => ClientResource::make($client),
            'appointment' => AppointmentResource::make($appointment),
            'types' => EnumTranslator::translate(MassageType::class),

        ]);
    }
}
