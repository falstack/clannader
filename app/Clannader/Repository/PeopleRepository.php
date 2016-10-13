<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 下午8:36
 */

namespace App\Clannader\Repository;


use App\Clannader\ApiSerializer;
use App\Clannader\Models\Relation\Like;
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
    protected $likes;

    public function __construct(User $user,
                                InfoTransformer $infoTransformer,
                                ApiSerializer $apiSerializer,
                                MessageTransformer $messageTransformer,
                                Message $message,
                                Like $likes)
    {
        $this->user = $user;
        $this->infoTransformer = $infoTransformer;
        $this->apiSerializer = $apiSerializer;
        $this->messageTransformer = $messageTransformer;
        $this->message = $message;
        $this->likes = $likes;
    }

    public function getUserInfo($zone, $user_id)
    {
        $item = $this->getUserByZone($zone);

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
        $list = $this->message->where('target_id', $user_id)->limit(20)->get();

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

    public function pinkList($form)
    {
        $id = $this->getUserIdByZone($form['id']);

        $like = $this->likes->whereRaw('user_id = ? and link_type = ?', [$id, 'User'])->pluck('link_id');

        $list =  $this->user->whereIn('id', $like)->offset($form['offset'])->limit($form['limit'])->orderBy($form['sortby'], $form['order'])->get();

        $total = $this->likes->whereRaw('user_id = ? and link_type = ?', [$id, 'User'])->count();

        return $this->response->collection($list, $this->infoTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        })->addMeta('total', $total);
    }

    public function getUserByZone($zone)
    {
        return $this->user->where('zone', $zone)->first();
    }

    public function getUserIdByZone($zone)
    {
        return $this->user->where('zone', $zone)->value('id');
    }
}