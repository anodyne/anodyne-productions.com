<?php

namespace App\Casts;

use App\Enums\LinkType;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Links implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        if ($value === null) {
            return [];
        }

        return array_map(function ($item) {
            return [
                'type' => LinkType::tryFrom($item->type),
                'value' => $item->value,
            ];
        }, json_decode($value));
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        $values = array_map(function ($item) {
            return [
                'type' => $item['type'],
                'value' => $item['value'],
            ];
        }, $value);

        return json_encode($values);
    }
}
