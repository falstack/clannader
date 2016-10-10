<?php

namespace App\Clannader\Repository;


use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\Relation\Message;
use App\Clannader\Models\User;
use App\Clannader\Presenter\MessagePresenter;

class LikeRepository extends RelationRepository
{
    protected $like;
    protected $message;
    protected $messagePresenter;

    public function __construct(Like $like,
                                Message $message,
                                MessagePresenter $messagePresenter)
    {
        $this->like = $like;
        $this->message = $message;
        $this->messagePresenter = $messagePresenter;
    }

    public function agree($id, $type, $user)
    {
        if ($type == 'User') {
            $id = User::where('zone', $id)->value('id');
        }

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
                'method' => $this->messagePresenter->formatMethod($new->link_type),
                'attack_id' => $new->user_id,
                'about_id' => $new->link_id,
                'about_type' => $new->link_type,
                'target_id' => $type == 'User' ? $new->link->id : $new->link->user_id
            ];

            if ($new->link_type == 'Comment') {

                while ($new->link_type == 'Comment') {
                    $new = $new->link;
                }

                $data = array_merge($data, [
                    'from_type' => $new->link_type,
                    'from_id' => $new->link_id
                ]);

            } else {

                $data = array_merge($data, [
                    'from_type' => null,
                    'from_id' => 0
                ]);
            }

            event(new \App\Events\User\SendMessage(Message::create($data)));

        } else {

            $agree->delete();

            $agree->link->increment('like', -1);

            if ($agree->link_type == 'Bangumi') return;

            $this->pullMessage($agree->linkable_id, $agree->linkable_type, $user->id);
        }
    }
}