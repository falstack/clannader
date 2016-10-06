<?php

namespace App\Clannader\Models\Post;

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

    public function scopeGetlist($query)
    {
        $query->join('users', 'users.id', '=', 'posts.user_id')
            ->select(
                'users.name as userName',
                'users.avatar as userFace',
                'users.zone as userHome',
                'posts.id as id',
                'posts.name as title',
                'posts.content as content',
                'posts.talk as talk',
                'posts.like as like',
                'posts.created_at as created_at'
            );
    }
}