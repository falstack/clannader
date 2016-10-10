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

    public function formatMethod($arg)
    {
        switch ($arg) {
            case 'Post' :
                return "赞";
            case 'Comment' :
                return '赞';
            case 'User' :
                return '关注';
            default :
                return '赞';
        }
    }
}