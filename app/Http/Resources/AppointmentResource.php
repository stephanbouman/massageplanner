<?php

namespace App\Http\Resources;

use App\Enums\MassageType;
use App\Models\Appointment;
use IFresh\EnumTranslations\EnumTranslatorFacade as EnumTranslator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Appointment */
class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $clientName = sprintf('%s %s', $this->client->first_name, $this->client->last_name);

        return [
            'id' => $this->id,
            'client_id' => $this->client_id,
            'client_name' => $clientName,
            'date' => $this->date,
            'date_friendly' => $this->date->isoFormat('dddd D MMMM  H:mm'),
            'date_formatted' => $this->date?->format('Y-m-d H:i'),
            'type' => $this->type,
            'type_friendly' => EnumTranslator::translateValue(MassageType::class, $this->type),
            'duration' => $this->expected_duration,
            'expected_duration' => $this->expected_duration,
            'additional_info' => $this->additional_info,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
