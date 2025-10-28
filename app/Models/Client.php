<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'injuries',
        'birth_date',
        'gender',
        'address',
        'postal_code',
        'city',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'gender' => Gender::class,
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


    public function routeNotificationForMail(): ?string
    {
        return $this->email ?? null;
    }

}
