<?php

namespace App\Models\Builders;

use App\Enums\GameStatus;
use Illuminate\Database\Eloquent\Builder;

class GameBuilder extends Builder
{
    public function isExcluded(): self
    {
        return $this->where('is_excluded', '=', true);
    }

    public function isIncluded(): self
    {
        return $this->where('is_excluded', '=', false);
    }

    public function isInactive(): self
    {
        return $this->whereIn('status', [
            GameStatus::Abandoned,
            GameStatus::Inactive,
            GameStatus::Unreachable,
        ]);
    }

    public function isNotInactive(): self
    {
        return $this->whereNotIn('status', [
            GameStatus::Abandoned,
            GameStatus::Inactive,
            GameStatus::Unreachable,
        ]);
    }

    public function isMysql(): self
    {
        return $this->whereRaw('lower(db_version) not like ?', ['%mariadb%']);
    }

    public function isMariadb(): self
    {
        return $this->whereRaw('lower(db_version) like ?', ['%mariadb%']);
    }

    public function isReadyForNova3(): self
    {
        return $this->isIncluded()
            ->where('php_version', '>=', '8.3')
            ->where(function (Builder $query) {
                return $query->where(fn (Builder $q) => $q->isMariadb()->where('db_version', '>=', '10.0'))
                    ->orWhere(fn (Builder $q) => $q->isMysql()->where('db_version', '>=', '8.0'));
            });
    }
}
