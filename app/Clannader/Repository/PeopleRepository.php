<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 下午8:36
 */

namespace App\Clannader\Repository;


use App\Clannader\ApiSerializer;
use App\Clannader\Models\Relation\Message;
use App\Clannader\Models\User;
use App\Clannader\Transformer\People\InfoTransformer;
use App\Clannader\Transformer\People\MessageTransformer;

class PeopleRepository extends RelationRepository
{
    protected $user;
    protected $infoTransformer;
    protected $apiSerializer;
    protected $messageTransformer;
    protected $message;

    public function __construct(User $user,
                                InfoTransformer $infoTransformer,
                                ApiSerializer $apiSerializer,
                                MessageTransformer $messageTransformer,
                                Message $message)
    {
        $this->user = $user;
        $this->infoTransformer = $infoTransformer;
        $this->apiSerializer = $apiSerializer;
        $this->messageTransformer = $messageTransformer;
        $this->message = $message;
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

    public function getUserMessage($user_id)
    {
        $list = $this->message->where('target_id', $user_id)->get();

        return $this->response->collection($list, $this->messageTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function readMessage($id, $user_id)
    {
        $this->message->whereRaw('id = ? and target_id = ?', [$id, $user_id])->update(array(
            'read' => 1
        ));
    }
}