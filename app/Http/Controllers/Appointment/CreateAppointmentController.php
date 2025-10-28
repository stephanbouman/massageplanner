<?php

namespace App\Http\Controllers\Appointment;

use App\Enums\MassageType;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use IFresh\EnumTranslations\EnumTranslatorFacade as EnumTranslator;

class CreateAppointmentController
{
    public function __invoke(Client $client)
    {
        return inertia('ClientAppointment/Create', [
            'client' => ClientResource::make($client),
            'types' => EnumTranslator::translate(MassageType::class),
        ]);
    }
}
