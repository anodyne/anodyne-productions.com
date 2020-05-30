<?php

namespace Domain\Support\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ContactData extends DataTransferObject
{
    public string $name;

    public string $email;

    public string $message;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
    }
}
