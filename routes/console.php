<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:send-reminders')
    ->dailyAt('10:00');
