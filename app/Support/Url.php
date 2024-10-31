<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;

readonly class Url implements Arrayable
{
    public function __construct(
        public ?string $scheme = null,
        public ?string $host = null,
        public ?string $port = null,
        public ?string $user = null,
        public ?string $pass = null,
        public ?string $path = null,
        public ?string $query = null,
        public ?string $fragment = null
    ) {}

    public static function parse(string $url): static
    {
        $components = parse_url($url);

        return new static(
            scheme: $components['scheme'] ?? null,
            host: $components['host'] ?? null,
            port: $components['port'] ?? null,
            user: $components['user'] ?? null,
            pass: $components['pass'] ?? null,
            path: $components['path'] ?? null,
            query: $components['query'] ?? null,
            fragment: $components['fragment'] ?? null
        );
    }

    public function query(): UrlQueryParameters
    {
        return UrlQueryParameters::parse($this->query);
    }

    public function urlWithPath(): string
    {
        return str(implode([$this->host, $this->path]))->finish('/');
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
