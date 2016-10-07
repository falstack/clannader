<?php

namespace App\Clannader\Repository;

use App\Clannader\Models\Post\Post;

class PostRepository extends Repository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPostListByNews($offset, $take)
    {
        $list =  $this->post->skip($take * $offset)->take($take)->getList()->get();

        return $this->responseOK($list);
    }

    public function showPost($id, $user_id)
    {
        $ret = $this->post->getOne()->findOrFail($id);

        $ret->isMe = $ret->isMe == $user_id;

        return $this->responseOK($ret);
    }
}