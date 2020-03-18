<?php

namespace Domain\Account\Presenters;

use Domain\Account\Models\User;
use Illuminate\Support\Facades\Gate;
use Support\Presenters\FlexiblePresenter;

class UserPresenter extends FlexiblePresenter
{
    public function values(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'username' => $this->resource->username,
            'email' => $this->resource->email,
            'bio' => $this->resource->bio,
            'url' => $this->resource->url,
            'twitter' => $this->resource->twitter,
            'facebook' => $this->resource->facebook,
            'google' => $this->resource->google,
            'discord' => $this->resource->discord,
            'can' => [
                'delete' => Gate::allows('delete', $this->resource),
                'update' => Gate::allows('update', $this->resource),
                'view' => Gate::allows('view', $this->resource),
            ],
        ];
    }

    public function collectionValues(): array
    {
        return [
            'can' => [
                'create' => Gate::allows('create', User::class),
            ],
        ];
    }

    public function presetAccountInfo()
    {
        return $this->except('can');
    }

    public function presetProfile()
    {
        return $this->except('can', 'name', 'email');
    }
}
