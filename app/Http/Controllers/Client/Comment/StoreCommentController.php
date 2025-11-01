<?php

namespace App\Http\Controllers\Client\Comment;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class StoreCommentController
{
    public function __invoke(StoreCommentRequest $request, Client $client): RedirectResponse
    {
        $comment = new Comment;
        $comment->body = $request->body;

        $client->comments()->save($comment);

        return to_route('clients.show', $client);
    }
}
