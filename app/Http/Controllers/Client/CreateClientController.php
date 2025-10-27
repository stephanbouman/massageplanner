<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class CreateClientController extends Controller
{
    public function __invoke()
    {
        return inertia('Client/Create');
    }
}
