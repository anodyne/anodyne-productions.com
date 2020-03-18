<?php

namespace Domain\Account\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    public function filter(array $filters)
    {
        return $this->when($filters['search'] ?? null, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%");
        });
    }

    public function whereReadyForDeletion()
    {
        return $this->onlyTrashed()
            ->where('deleted_at', '<=', now()->subDays(30)->startOfDay());
    }
}
