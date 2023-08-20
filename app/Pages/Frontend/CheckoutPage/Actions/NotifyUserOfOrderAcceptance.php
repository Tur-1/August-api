<?php

namespace App\Pages\Frontend\CheckoutPage\Actions;

use App\Mail\NewOrderMail;

use Illuminate\Support\Facades\Mail;

class NotifyUserOfOrderAcceptance
{
    public function handle($orderInformation)
    {
        // Mail::to(auth()->user()->email)->send(new NewOrderMail($orderInformation));
    }
}
