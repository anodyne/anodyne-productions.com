<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReleaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'version' => $this->version,
            'series' => str($this->releaseSeries->name)->remove('Nova '),
            'release_date' => $this->date,
            'severity' => $this->severity,
            'description' => $this->notes,
            'notes' => $this->details,
            'tags' => $this->tags,
        ];
    }
}
