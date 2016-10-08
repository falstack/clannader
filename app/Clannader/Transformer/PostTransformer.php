<?php

namespace App\Clannader\Transformer;

use App\Clannader\Models\Post\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'title' => $post->name,
            'content' => $post->content,
            'like' => $post->like,
            'talk' => $post->talk,
            'isMe' => $post->isMe,
            'hasLike' => $post->hasLike,
            'uName' => $post->user->name,
            'uFace' => $post->user->avatar,
            'uHome' => $post->user->zone,
            'bName' => $post->bangumi->name,
            'bFace' => $post->bangumi->avatar,
            'bHome' => $post->bangumi_id,
            'time' => $post->created_at->diffForHumans(),
            'update' => $post->updated_at->toDateTimeString()
        ];
    }
}