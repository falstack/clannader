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

            $row->hasLike = (boolean)Like::whereRaw('link_id = ? and link_type = ? and user_id = ?', [$row->id, $type, $user_id])->count();

        } else {

            $row->hasLike = false;
        }

        return $row;
    }
}