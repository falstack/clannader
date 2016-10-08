<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Post\Post;
use App\Clannader\Transformer\PostTransformer;

class PostRepository extends RelationRepository
{

    protected $post;
    protected $postTransformer;
    protected $apiSerializer;

    public function __construct(Post $post,
                                PostTransformer $postTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->post = $post;
        $this->postTransformer = $postTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function getPostListByNews($offset, $take)
    {
        $list =  $this->post->skip($take * $offset)->take($take)->get();

        return $this->response->collection($list, $this->postTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function showPost($id, $user_id)
    {
        $ret = $this->post->findOrFail($id);

        return $this->response->item($this->itemMergeLikeAndMe($ret, 'Post', $user_id), $this->postTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }
}