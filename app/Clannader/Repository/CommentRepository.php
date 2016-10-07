<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Morph\Comment;
use App\Clannader\Models\Morph\Message;
use App\Clannader\Transformer\CommentTransformer;
use Mews\Purifier\Facades\Purifier;

class CommentRepository extends Repository
{
    protected $comment;
    protected $message;
    protected $commentTransformer;
    protected $apiSerializer;

    public function __construct(Comment $comment,
                                Message $message,
                                CommentTransformer $commentTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->comment = $comment;
        $this->message = $message;
        $this->commentTransformer = $commentTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function getCommentList($id, $type, $user_id)
    {
        $list = $this->comment->whereRaw('link_id = ? and link_type = ?', [$id, $type])->get();

        return $this->response->collection($this->checkHasLikeAndIsMe($list, 'Comment', $user_id), $this->commentTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function commentStore($form, $user)
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

        return $this->responseOK($this->resItem($new, false));
    }

    public function pushMessage($new)
    {
        if ($new->user_id == $new->link->user_id) return;

        $data = [
            'attack_id' => $new->user_id,
            'target_id' => $new->link->user_id,
            'about_id' => $new->link_id,
            'about_type' => $new->link_type
        ];

        if ($new->link_type == 'Comment') {
            $data = array_merge($data, [
                'from_id' => $new->link->link_id,
                'from_type' => $new->link->link_type
            ]);
        }

        $msg = $this->message->create($data);

        event(new \App\Events\User\SendMessage($msg));
    }

    public function commentReplyStore($form, $user)
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

        return $this->responseOK($this->resItem($new, true));
    }

    public function resItem($new, $bool)
    {
        $data =  [
            'id' => $new->id,
            'content' => $new->content,
            'isMe' => true,
            'hasLike' => false,
            'like' => 0,
            'talk' => 0,
            'time' => $new->created_at->toDateTimeString(),
            'uFace' => $new->user->avatar,
            'uName' => $new->user->name,
            'uHome' => $new->user->zone
        ];

        if ($bool) {
            $data = array_merge($data, [
                'tName' => $new->target->name,
                'tHome' => $new->target->zone
            ]);
        }

        return $data;
    }
}