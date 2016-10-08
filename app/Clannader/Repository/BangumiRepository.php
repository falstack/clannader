<?php

namespace App\Clannader\Repository;

use App\Clannader\ApiSerializer;
use App\Clannader\Models\Bangumi\Bangumi;
use App\Clannader\Transformer\Bangumi\InfoTransformer;

class BangumiRepository extends RelationRepository
{
    protected $bangumi;
    protected $infoTransformer;
    protected $apiSerializer;

    public function __construct(Bangumi $bangumi,
                                InfoTransformer $infoTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->bangumi = $bangumi;
        $this->infoTransformer = $infoTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function getBangumiInfo($id, $user_id)
    {
        $item = $this->bangumi->findOrFail($id);

        return $this->response->item($this->checkHasLike($item, 'Bangumi', $user_id), $this->infoTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }
}