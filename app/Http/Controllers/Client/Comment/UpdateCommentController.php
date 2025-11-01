<?php

namespace App\Http\Controllers\Client\Comment;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Client;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class UpdateCommentController
{
    public function __invoke(StoreCommentRequest $request, Client $client, Comment $comment): RedirectResponse
    {
        $comment->body = $request->body;
        $comment->save();

        return to_route('clients.show', $client);
    }
}
