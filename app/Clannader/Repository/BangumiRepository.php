<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Bangumi\Bangumi;
use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\User;
use App\Clannader\Transformer\Bangumi\InfoTransformer;

class BangumiRepository extends RelationRepository
{
    protected $bangumi;
    protected $infoTransformer;
    protected $apiSerializer;
    protected $likes;

    public function __construct(Bangumi $bangumi,
                                InfoTransformer $infoTransformer,
                                ApiSerializer $apiSerializer,
                                Like $likes)
    {
        $this->bangumi = $bangumi;
        $this->infoTransformer = $infoTransformer;
        $this->apiSerializer = $apiSerializer;
        $this->likes = $likes;
    }

    public function getBangumiInfo($id, $user_id)
    {
        $item = $this->bangumi->findOrFail($id);

        return $this->response->item($this->checkHasLike($item, 'Bangumi', $user_id), $this->infoTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }

    public function getBangumiList($form, $user_id)
    {
        $role = isset($form['id']);

        if ($role) {
            $id = User::where('zone', $form['id'])->value('id');
            $like = $this->likes->whereRaw('user_id = ? and link_type = ?', [$id, 'Bangumi'])->pluck('link_id');
            $total = $this->likes->whereRaw('user_id = ? and link_type = ?', [$id, 'Bangumi'])->count();
        } else {
            $id = null;
            $like = null;
            $total = $this->bangumi->count();
        }

        $list =  $this->bangumi->when($role, function ($query) use ($like) {
            return $query->whereIn('id', $like);
        })->offset($form['offset'])->limit($form['limit'])->orderBy($form['sortby'], $form['order'])->get();

        foreach ($list as $row) {
            $row = $this->checkHasLike($row, 'Bangumi', $user_id);
        }

        return $this->response->collection($list, $this->infoTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        })->addMeta('total', $total);
    }
}