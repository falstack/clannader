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
        $list =  $this->post->skip($take * $offset)->take($take)->getlist()->get();

        return $this->responseOK($list);
    }
}