<?php

namespace App\Http\Controllers\Client;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use IFresh\EnumTranslations\EnumTranslatorFacade;

class CreateClientController extends Controller
{
    public function __invoke()
    {
        return inertia('Client/Create',
            [
                'genders' => EnumTranslatorFacade::translate(Gender::class),
            ]);
    }
}
