<?php

namespace App\Http\Controllers\Client;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use IFresh\EnumTranslations\EnumTranslatorFacade;

class EditClientController extends Controller
{
    public function __invoke(Client $client)
    {
        return inertia('Client/Edit', [
            'genders' => EnumTranslatorFacade::translate(Gender::class),
            'client' => ClientResource::make($client),
        ]);
    }
}
