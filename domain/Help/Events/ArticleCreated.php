<?php

namespace Domain\Help\Events;

use Domain\Help\Article;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ArticleCreated
{
    use Dispatchable, SerializesModels;

    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}
