<?php

namespace Domain\Help;

use Domain\Help\Events;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'help_articles';

    protected $dispatchesEvents = [
        'created' => Events\ArticleCreated::class,
        'deleted' => Events\ArticleDeleted::class,
        'updated' => Events\ArticleUpdated::class,
    ];
}
