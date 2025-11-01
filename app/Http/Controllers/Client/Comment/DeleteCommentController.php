<?php

namespace App\Http\Controllers\Client\Comment;

use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class DeleteCommentController
{
    public function __invoke(Client $client, Comment $comment): RedirectResponse
    {
        $comment->delete();

        return to_route('clients.show', $client);
    }
}
