<?php

namespace App\Clannader\Transformer;

use App\Clannader\Models\Morph\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'content' => $comment->content,
            'like' => $comment->like,
            'talk' => $comment->talk,
            'isMe' => $comment->isMe,
            'hasLike' => $comment->hasLike,
            'uName' => $comment->user->name,
            'uFace' => $comment->user->avatar,
            'uHome' => $comment->user->zone,
            'uWord' => $comment->user->autograph,
            'tName' => $comment->target_id ? $comment->target->name : null,
            'tHome' => $comment->target_id ? $comment->target->zone : null,
            'time' => $comment->created_at->diffForHumans()
        ];
    }
}