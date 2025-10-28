<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;

class EditClientController extends Controller
{
    public function __invoke(Client $client)
    {
        return inertia('Client/Edit', [
            'client' => ClientResource::make($client),
        ]);
    }
}
