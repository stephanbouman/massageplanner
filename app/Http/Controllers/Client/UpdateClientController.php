<?php

namespace App\Http\Controllers\Client;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class UpdateClientController extends Controller
{
    public function __invoke(Request $request, Client $client)
    {
        $client->first_name = $request->get('first_name');
        $client->last_name = $request->get('last_name');
        $client->email = $request->get('email');
        $client->phone = $request->get('phone');
        $client->gender = $request->enum('gender', Gender::class);
        $client->birth_date = $request->get('birth_date');
        $client->gender = $request->get('gender');
        $client->address = $request->get('address');
        $client->postal_code = $request->get('postal_code');
        $client->city = $request->get('city');
        $client->main_sport = $request->get('main_sport');
        $client->occupation = $request->get('occupation');
        $client->social_anamnesis = $request->get('social_anamnesis');
        $client->health_conditions = $request->get('health_conditions');
        $client->sports_quantity = $request->get('sports_quantity');
        $client->old_injuries = $request->get('old_injuries');
        $client->current_injuries = $request->get('current_injuries');

        $client->save();

        return to_route('clients.show', $client);

    }
}
