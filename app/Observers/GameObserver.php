<?php

namespace App\Observers;

use App\Models\Game;

class GameObserver
{
    public function saving(Game $game)
    {
        if ($game->isDirty('status')) {
            $game->status_updated_at = now();
        }
    }
}
