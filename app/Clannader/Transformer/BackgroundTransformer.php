<?php
/**
 * Created by PhpStorm.
 * User: yuistack
 * Date: 2016/10/8
 * Time: 上午9:56
 */

namespace App\Clannader\Transformer;


use App\Clannader\Models\Background;
use League\Fractal\TransformerAbstract;

class BackgroundTransformer extends TransformerAbstract {

    public function transform(Background $background) {

        if ($background->user_id == 0) {
            $user_name = '来自网络';
            $user_home = null;
            $avatar = 'http://cdn.clannader.com/avatar';
        } else {
            $user_name = $background->user->name;
            $user_home = $background->user->spacename;
            $avatar = $background->user->avatar;
        }

        if ($background->bangumi_id == 0) {
            $bangumi_id = null;
            $bangumi_name = '未知';
        } else {
            $bangumi_id = $background->bangumi_id;
            $bangumi_name = $background->bangumi->name;
        }

        return [
            'id' => $background->id,
            'href' => $background->href,
            'bHome' => $bangumi_id,
            'bName' => $bangumi_name,
            'uHome' => $user_home,
            'uName' => $user_name,
            'avatar' => $avatar
        ];
    }
}