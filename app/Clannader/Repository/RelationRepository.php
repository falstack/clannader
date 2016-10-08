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
                'from_type' => '',
                'target_id' => $new->link->user_id
            ]);
        }

        $msg = Message::create($data);

        event(new \App\Events\User\SendMessage($msg));
    }

    public function listMergeLikeAndMe($list, $type, $user_id)
    {
        foreach ($list as $row) {
            $row->isMe = $row->user_id == $user_id;
            $row->hasLike = (boolean)$this->checkHasLike($row->id, $type, $user_id);
        }

        return $list;
    }

    public function itemMergeLikeAndMe($row, $type, $user_id)
    {
        $row->isMe = $row->user_id == $user_id;
        $row->hasLike = (boolean)$this->checkHasLike($row->id, $type, $user_id);

        return $row;
    }

    public function checkHasLike($id, $type, $user_id)
    {
        if ($user_id) {

            return Like::whereRaw('likeable_id = ? and likeable_type = ? and user_id = ?', [$id, $type, $user_id])->count();

        } else {

            return 0;
        }
    }

}