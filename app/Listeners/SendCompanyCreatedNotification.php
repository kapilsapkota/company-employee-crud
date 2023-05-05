<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use Illuminate\Support\Facades\Mail;

class SendCompanyCreatedNotification
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
     * @param  object  $event
     * @return void
     */

    public function handle(CompanyCreated $event)
    {
        $company = $event->company;

        Mail::to('admin@admin.com')->send(new \App\Mail\CompanyCreated($company));
    }
}
