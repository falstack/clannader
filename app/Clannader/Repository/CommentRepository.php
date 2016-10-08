<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Morph\Comment;
use App\Clannader\Transformer\CommentTransformer;
use Mews\Purifier\Facades\Purifier;

class CommentRepository extends RelationRepository
{
    protected $comment;
    protected $commentTransformer;
    protected $apiSerializer;

    public function __construct(Comment $comment,
                                CommentTransformer $commentTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->comment = $comment;
        $this->commentTransformer = $commentTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function list($id, $type, $user_id)
    {
        $list = $this->comment->whereRaw('link_id = ? and link_type = ?', [$id, $type])->get();

        return $this->response->collection($this->listMergeLikeAndMe($list, 'Comment', $user_id), $this->commentTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function store($form, $user)
    {
        $data = [
            'user_id' => $user->id,
            'link_id' => $form['id'],
            'link_type' => $form['type'],
            'content' => Purifier::clean($form['content'])
        ];

        $new = $this->comment->create($data);

        $new->link->increment('talk');

        $this->pushMessage($new);

        return $this->response->item($this->itemMergeLikeAndMe($new, 'Comment', $user->id), $this->commentTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function reply($form, $user)
    {
        $comment = $this->comment->findOrFail($form['id']);

        if ($form['id'] == $form['target']) {
            $target_id = $comment->user_id;
        } else {
            $target = $this->comment->findOrFail($form['target']);
            $target_id = $target->user_id;
        }

        $data = [
            'user_id' => $user->id,
            'target_id' => $target_id,
            'link_id' => $comment->id,
            'link_type' => 'Comment',
            'content' => Purifier::clean($form['content'])
        ];

        $new = $this->comment->create($data);

        $new->link->increment('talk');

        $this->pushMessage($new);

        return $this->response->item($this->itemMergeLikeAndMe($new, 'Comment', $user->id), $this->commentTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function delete($id, $user)
    {
        $comment = $this->comment->findOrFail($id);

        if ($comment->user_id != $user->id) return;

        $comment->link->increment('talk', -1);

        $comment->delete();

        $this->pullMessage($comment->link_id, $comment->link_type, $user->id);
    }
}