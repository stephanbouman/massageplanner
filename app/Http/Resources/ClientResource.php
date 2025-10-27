<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Client */
class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => sprintf("%s %s",$this->first_name,$this->last_name),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'birth_date_friendly' => $this->birth_date?->isoFormat('D MMMM YYYY'),
            'birth_date_formatted' => $this->birth_date?->format('Y-m-d'),
            'gender' => $this->gender,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'main_sport' => $this->main_sport,
            'occupation' => $this->occupation,
            'social_anamnesis' => $this->social_anamnesis,
            'health_conditions' => $this->health_conditions,
            'sports_quantity' => $this->sports_quantity,
            'old_injuries' => $this->old_injuries,
            'current_injuries' => $this->current_injuries,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'appointments_count' => $this->appointments_count,
        ];
    }
}
