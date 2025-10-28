<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'client_id',
        'date',
        'type',
        'expected_duration',
        'additional_info',
    ];

    protected $casts = [
      'date' => 'datetime',
    ];

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
