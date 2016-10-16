<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Post\Post;
use App\Clannader\Models\User;
use App\Clannader\Transformer\PostTransformer;
use Mews\Purifier\Facades\Purifier;

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

    public function getPosts($form)
    {
        $role = isset($form['id']);
        if ($role) {
            if ($form['type'] == 'User') {
                $id = User::where('zone', $form['id'])->value('id');
                $type = 'user_id';
            } else {
                $id = $form['id'];
                $type = 'bangumi_id';
            }
        } else {
            $type = null;
            $id = null;
        }
        $list =  $this->post->when($role, function ($query) use ($type, $id) {
            return $query->where($type, $id);
        })->offset($form['offset'])->limit($form['limit'])->orderBy($form['sortby'], $form['order'])->get();
        $total = $this->post->when($role, function ($query) use ($type, $id) {
            return $query->where($type, $id);
        })->count();

        return $this->response->collection($list, $this->postTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        })->addMeta('total', $total);
    }

    public function showPost($id, $user_id)
    {
        $ret = $this->post->findOrFail($id);

        return $this->response->item($this->itemMergeLikeAndMe($ret, 'Post', $user_id), $this->postTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function postStore($name, $content, $bid, $user)
    {
        $new = $this->post->create([
            'user_id' => $user->id,
            'name' => $name,
            'bangumi_id' => $bid,
            'content' => Purifier::clean($content)
        ]);

        return response()->json(['data' => $new->id], 200);
    }
}