<?php

namespace App\Console\Commands;

use App\Mail\NewPost;
use App\Models\Post;
use App\Models\User;
use App\Models\UserWebsiteSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Emails to subscribers of particular website when new post is published to it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postId = $this->argument('post');
        $post = Post::where('id', $postId)->first();

        $subscribedUsers = UserWebsiteSubscription::where('site_id', $post->site_id)->pluck('user_id')->toArray();

        $recipients = User::whereIn('id', $subscribedUsers)->pluck('email')->toArray();

        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new NewPost($post));
        }
    }
}
