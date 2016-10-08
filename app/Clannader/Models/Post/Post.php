<?php

namespace App\Clannader\Models\Post;

use App\Clannader\Models\Bangumi\Bangumi;
use App\Clannader\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'bangumi_id', 'name', 'content', 'talk', 'like'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bangumi()
    {
        return $this->hasOne(Bangumi::class, 'id', 'bangumi_id');
    }
}