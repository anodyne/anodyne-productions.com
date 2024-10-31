<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;

readonly class UrlQueryParameters implements Arrayable
{
    public function __construct(
        protected array $parameters = []
    ) {}

    public static function parse(?string $query): static
    {
        if (is_null($query)) {
            return new static;
        }

        parse_str(
            str(urldecode($query))->replaceStart('?', '')->toString(),
            $parameters
        );

        return new static ($parameters);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->parameters[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return isset($this->parameters[$key]);
    }

    public function toArray(): array
    {
        return $this->parameters;
    }
}
