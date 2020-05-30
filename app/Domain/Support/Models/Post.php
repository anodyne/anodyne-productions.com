<?php

namespace Domain\Support\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    const CREATED_AT = 'post_time';

    const UPDATED_AT = 'post_edit_time';

    public $timestamps = false;

    protected $table = 'phpbb_posts';

    protected $primaryKey = 'post_id';

    protected $dates = [
        'post_time',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function toSearchableArray()
    {
        return [
            'post_id' => $this->post_id,
            'post_subject' => $this->post_subject,
            'post_text' => $this->post_text,
        ];
    }
}
