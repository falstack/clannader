<?php

namespace App\Clannader\Repository;


use App\Clannader\Models\Morph\Like;
use Dingo\Api\Routing\Helpers;

class Repository
{
    use Helpers;

    public function responseOK($data)
    {
        return response()->json(['data' => $data], 200);
    }

    public function checkHasLike($id, $type, $user_id)
    {
        if ($user_id) {

            return Like::whereRaw('likeable_id = ? and likeable_type = ? and user_id = ?', [$id, $type, $user_id])->count();

        } else {

            return 0;
        }
    }

    public function checkHasLikeAndIsMe($list, $type, $user_id)
    {
        foreach ($list as $row) {
            $row->isMe = $row->user_id == $user_id;
            $row->hasLike = (boolean)$this->checkHasLike($row->id, $type, $user_id);
        }

        return $list;
    }
}