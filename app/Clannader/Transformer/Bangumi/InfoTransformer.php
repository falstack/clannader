<?php

namespace App\Clannader\Transformer\Bangumi;

use App\Clannader\Models\Bangumi\Bangumi;
use League\Fractal\TransformerAbstract;

class InfoTransformer extends TransformerAbstract
{
    public function transform(Bangumi $bangumi)
    {
        return [
            'id' => $bangumi->id,
            'name' => $bangumi->name,
            'avatar' => $bangumi->avatar,
            'banner' => $bangumi->banner,
            'summary' => $bangumi->summary,
            'hasLike' => $bangumi->hasLike
        ];
    }
}