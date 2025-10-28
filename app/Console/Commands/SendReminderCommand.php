<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Notifications\AppointmentReminder;

class SendReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Appointment::where('date','>',today()->addDay()->startOfDay())
            ->where('date','<',today()->addDay()->endOfDay())
            ->get()
            ->each(function (Appointment $appointment) {
                if (filled($appointment->client->email) ){
                    Log::info(sprintf('Sending reminder for %s', $appointment->client->email));

                    $appointment->client->notify(new AppointmentReminder($appointment));
                }
            });

    }
}
