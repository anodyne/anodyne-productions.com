<?php

namespace App\Console\Commands;

use Domain\Support\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;
use Domain\BBCode\Parsers\BTagParser;
use Domain\BBCode\Parsers\ITagParser;
use Domain\BBCode\Parsers\CodeTagParser;
use Domain\BBCode\Parsers\ListTagParser;
use Domain\BBCode\Parsers\QuoteTagParser;
use Domain\Account\Actions\ForceDeleteUser;
use Domain\BBCode\Parsers\ListItemTagParser;
use Domain\BBCode\Parsers\QuotePersonTagParser;

class CleanForumPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:clean-forum-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean the BBCode used for forum posts.';

    protected $action;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ForceDeleteUser $action)
    {
        parent::__construct();

        $this->action = $action;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::cursor();

        $posts->each(function ($post) {
            $this->cleanPost($post);
        });

        $this->line('');
        $this->info('Forum post cleanup completed!');
    }

    protected function cleanPost(Post $post)
    {
        $text = str_replace(":{$post->bbcode_uid}", '', $post->post_text);
        $post->forceFill(['post_text' => $text]);
        $post->save();

        // app(Pipeline::class)
        //     ->send($post->post_text)
        //     ->through([
        //         BTagParser::class,
        //         ITagParser::class,
        //         ListTagParser::class,
        //         ListItemTagParser::class,
        //         QuotePersonTagParser::class,
        //         QuoteTagParser::class,
        //         CodeTagParser::class,
        //     ])
        //     ->then(function ($text) use ($post) {
        //         $post->forceFill(['post_text' => $text]);
        //         $post->save();
        //     });

        if ($post->post_id % 500 === 0) {
            $this->line('Forum post cleanup complete through ID ' . $post->post_id);
        }
    }
}
