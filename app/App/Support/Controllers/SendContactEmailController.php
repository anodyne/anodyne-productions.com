<?php

namespace App\Support\Controllers;

use Illuminate\Support\Facades\Mail;
use Domain\Support\Mail\SendContactEmail;
use App\Support\Requests\SendContactRequest;
use Domain\Support\DataTransferObjects\ContactData;

class SendContactEmailController
{
    public function __invoke(SendContactRequest $request)
    {
        Mail::queue(new SendContactEmail(ContactData::fromRequest($request)));

        return back();
    }
}
