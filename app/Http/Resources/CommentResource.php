<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin Comment */
class CommentResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'body' => $this->body,
            'body_markdown' => Str::of($this->body)->markdown(),
            'created_at_friendly' => $this->created_at->isoFormat('dddd D MMMM  H:mm'),
        ];
    }
}
