<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Notifications\NewPostAdded;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to notify subscribers about new post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Do you wish to continue?')) {
            Post::with('website.subscribers')->latest()->chunkById(50, function ($posts) {
                foreach ($posts as $post) {
                    Notification::send($post->website->subscribers, new NewPostAdded($post));
                }

                return Command::SUCCESS;
            });
        }



    }
}
