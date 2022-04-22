<?php

namespace App\Listeners;

use App\Events\EmployerAccountCreated;
use App\Mail\EmployerAccountCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmployerAccountCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmployerAccountCreated  $event
     * @return void
     */
    public function handle(EmployerAccountCreated $event)
    {
        $data = $event->data;

        Mail::to($data['email'])->send(new EmployerAccountCreatedMail($data));
    }
}
