<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 上午9:58
 */

namespace App\Clannader\Repository;


use App\Clannader\ApiSerializer;
use App\Clannader\Models\Background;
use App\Clannader\Transformer\BackgroundTransformer;

class OtherRepository extends Repository
{
    protected $background;
    protected $backgroundTransformer;
    protected $apiSerializer;

    public function __construct(Background $background,
                                BackgroundTransformer $backgroundTransformer,
                                ApiSerializer $apiSerializer)
    {
        $this->background = $background;
        $this->backgroundTransformer = $backgroundTransformer;
        $this->apiSerializer = $apiSerializer;
    }

    public function backgroundShow()
    {
        $item = $this->background->inRandomOrder()->first();

        return $this->response->item($item, $this->backgroundTransformer, [], function($resource, $fractal) {
            $fractal->setSerializer($this->apiSerializer);
        });
    }
}