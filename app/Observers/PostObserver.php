<?php

namespace App\Observers;

use App\Models\Post;
use App\Notifications\NewPostAdded;
use Illuminate\Support\Facades\Notification;

class PostObserver
{
    // public $afterCommit = true;
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $subscribers = $post->website->subscribers;

        Notification::send($subscribers, new NewPostAdded($post));
    }
}
