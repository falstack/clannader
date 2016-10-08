<?php

namespace App\Clannader\Repository;

use App\Clannader\Models\Bangumi\Bangumi;

class BangumiRepository extends Repository
{
    protected $bangumi;

    public function __construct(Bangumi $bangumi)
    {
        $this->bangumi = $bangumi;
    }

    public function info($id, $user_id)
    {
        
    }
}