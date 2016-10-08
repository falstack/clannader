<?php

namespace App\Clannader\Models;

use App\Clannader\Models\Bangumi\Bangumi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Background extends Model
{
    use SoftDeletes;

    protected $table = 'banners';

    protected $fillable = ['href', 'user_id', 'bangumi_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function bangumi()
    {
        return $this->hasOne(Bangumi::class, 'id', 'bangumi_id');
    }

    public function getHrefAttribute($href)
    {
        return 'http://cdn.clannader.com/' . $href;
    }
}
