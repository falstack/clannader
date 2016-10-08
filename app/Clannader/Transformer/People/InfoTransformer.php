<?php

namespace App\Clannader\Transformer\People;

use App\Clannader\Models\User;
use League\Fractal\TransformerAbstract;

class InfoTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'uName' => $user->name,
            'uHome' => $user->zone,
            'uFace' => $user->avatar,
            'uWord' => $user->autograph,
            'banner' => $user->banner,
            'sex' => $user->sex,
            'isMe' => $user->isMe,
            'hasLike' => $user->hasLike
        ];
    }
}