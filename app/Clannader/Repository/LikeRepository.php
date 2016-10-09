<?php

namespace App\Clannader\Repository;


use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\Relation\Message;

class LikeRepository extends RelationRepository
{
    protected $like;
    protected $message;

    public function __construct(Like $like,
                                Message $message)
    {
        $this->like = $like;
        $this->message = $message;
    }

    public function agree($id, $type, $user)
    {
        $agree = $this->like->whereRaw('link_id = ? and link_type = ? and user_id = ?', [$id, $type, $user->id])->first();

        if (is_null($agree)) {

            $new = $this->like->create([
                'link_id' => $id,
                'link_type' => $type,
                'user_id' => $user->id
            ]);

            $new->link->increment('like');

            if ($type == 'Bangumi') return;

            $data = [
                'attack_id' => $new->user_id,
                'about_id' => $new->link_id,
                'about_type' => $new->link_type,
                'target_id' => $new->link->user_id
            ];

            while ($new->link_type == 'Comment') {
                $new = $new->link;
            }

            $data = array_merge($data, [
                'from_id' => $new->link_id,
                'from_type' => $new->link_type,
            ]);

            event(new \App\Events\User\SendMessage(Message::create($data)));

        } else {

            $agree->delete();

            $agree->link->increment('like', -1);

            if ($agree->link_type == 'Bangumi') return;

            $this->pullMessage($agree->linkable_id, $agree->linkable_type, $user->id);
        }
    }
}