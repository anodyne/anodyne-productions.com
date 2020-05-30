<?php

namespace Domain\Support\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Domain\Support\DataTransferObjects\ContactData;

class SendContactEmail extends Mailable
{
    use Queueable;

    public $email;

    public $name;

    public $message;

    public function __construct(ContactData $data)
    {
        $this->name = $data->name;
        $this->email = $data->email;
        $this->message = $data->message;
    }

    public function build()
    {
        return $this->to('contact@anodyne-productions.com')
            ->from($this->email, $this->name)
            ->subject('[Anodyne Productions] New Message')
            ->view('emails.support.contact');
    }
}
