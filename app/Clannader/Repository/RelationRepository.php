<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 上午10:46
 */

namespace App\Clannader\Repository;


use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\Relation\Message;

class RelationRepository extends Repository
{
    public function pushMessage($new)
    {
        if ($new->user_id == $new->link->user_id && $new->link_type != 'Comment') return;

        $data = [
            'attack_id' => $new->user_id,
            'about_id' => $new->link_id,
            'about_type' => $new->link_type
        ];

        if ($new->link_type == 'Comment') {
            $data = array_merge($data, [
                'from_id' => $new->link->link_id,
                'from_type' => $new->link->link_type,
                'target_id' => $new->target_id,
            ]);
        } else {
            $data = array_merge($data, [
                'from_id' => 0,
                'from_type' => null,
                'target_id' => $new->link->user_id
            ]);
        }

        $msg = Message::create($data);

        event(new \App\Events\User\SendMessage($msg));
    }

    public function pullMessage($id, $type, $user_id)
    {
        $msg = $this->foundMessage($id, $type, $user_id);

        if (!is_null($msg)) {
            $msg->delete();
        }
    }

    public function foundMessage($id, $type, $user_id)
    {
        return Message::whereRaw('about_id = ? and about_type = ? and attack_id = ?', [$id, $type, $user_id])->first();
    }

    public function listMergeLikeAndMe($list, $type, $user_id)
    {
        foreach ($list as $row) {
            $row->isMe = $row->user_id == $user_id;
            $row = $this->checkHasLike($row, $type, $user_id);
        }

        return $list;
    }

    public function itemMergeLikeAndMe($row, $type, $user_id)
    {
        $row->isMe = $row->user_id == $user_id;
        $row = $this->checkHasLike($row, $type, $user_id);

        return $row;
    }

    public function checkHasLike($row, $type, $user_id)
    {
        if ($user_id) {

            $row->hasLike = (boolean)Like::whereRaw('likeable_id = ? and likeable_type = ? and user_id = ?', [$row->id, $type, $user_id])->count();

        } else {

            $row->hasLike = false;
        }

        return $row;
    }
}