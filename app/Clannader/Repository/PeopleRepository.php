<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 下午8:36
 */

namespace App\Clannader\Repository;


use App\Clannader\ApiSerializer;
use App\Clannader\Models\User;
use App\Clannader\Transformer\People\InfoTransformer;

class PeopleRepository extends RelationRepository
{
    protected $user;
    protected $infoTransformer;
    protected $apiSerializer;

    public function __construct(User $user,
                                InfoTransformer $infoTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->user = $user;
        $this->infoTransformer = $infoTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function getUserInfo($zone, $user_id)
    {
        $item = $this->user->where('zone', $zone)->first();

        if (is_null($item)) {
            return response()->json([], 500);
        }

        $item->isMe = $item->id == $user_id;

        return $this->response->item($this->checkHasLike($item, 'User', $user_id), $this->infoTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }
}