<?php

namespace Domain\Account\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class UserData extends FlexibleDataTransferObject
{
    public ?int $id;

    public string $name;

    public string $username;

    public string $email;

    public ?string $bio;

    public ?string $url;

    public ?string $twitter;

    public ?string $facebook;

    public ?string $google;

    public ?string $discord;

    public static function fromRequest(Request $request)
    {
        return new self([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
            'url' => $request->url,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'google' => $request->google,
            'discord' => $request->discord,
        ]);
    }
}
