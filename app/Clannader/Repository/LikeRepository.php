<?php

namespace App\Clannader\Repository;


use App\Clannader\Models\Morph\Like;

class LikeRepository
{
    protected $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function agree($id, $type, $user)
    {
        $agree = $this->like->whereRaw('likeable_id = ? and likeable_type = ? and user_id = ?', [$id, $type, $user->id])->first();

        if (is_null($agree)) {

            $new = $this->like->create([
                'likeable_id' => $id,
                'likeable_type' => $type,
                'user_id' => $user->id
            ]);

            $new->likeable->increment('like');

        } else {

            $agree->delete();

            $agree->likeable->increment('like', -1);
        }
    }
}