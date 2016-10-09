<?php

namespace App\Clannader\Presenter;

class MessagePresenter
{
    static public function formatClass ($arg)
    {
        switch ($arg) {
            case 'Post' :
                return "帖子";
            case 'Comment' :
                return '评论';
            default :
                return null;
        }
    }

    public function commentStoreMsgData($comment)
    {
        return [
            'attack_id' => $comment->user_id,
            'about_id' => $comment->link_id,
            'target_id' => $comment->link->user_id,
            'about_type' => $comment->link_type,
            'from_type' => null,
            'from_id' => 0
        ];
    }

    public function reply()
    {
        
    }
}