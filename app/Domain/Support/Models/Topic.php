<?php

namespace Domain\Support\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    const CREATED_AT = 'topic_time';

    protected $table = 'phpbb_topics';

    protected $primaryKey = 'topic_id';

    public function firstPost()
    {
        return $this->hasOne(Post::class, 'post_id', 'topic_first_post_id');
    }

    public function lastPost()
    {
        return $this->hasOne(Post::class, 'post_id', 'topic_last_post_id');
    }
}
