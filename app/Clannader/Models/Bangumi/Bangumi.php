<?php

namespace App\Clannader\Models\Bangumi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bangumi extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'summary', 'avatar', 'banner', 'like', 'score'];

    public function getAvatarAttribute($avatar)
    {
        return $avatar ? 'http://cdn.clannader.com/' . $avatar : 'http://cdn.clannader.com/avatar';
    }

    public function getBannerAttribute($banner)
    {
        return $banner ? 'http://cdn.clannader.com/' . $banner : 'http://cdn.clannader.com/B-banner';
    }
}
