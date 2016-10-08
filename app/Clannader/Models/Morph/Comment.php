<?php

namespace App\Clannader\Models\Morph;

use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'target_id', 'content', 'link_id', 'link_type', 'talk', 'like'];

    public function link()
    {
        return $this->morphTo();
    }

    public function talks()
    {
        return $this->morphMany(Comment::class, 'link');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function target()
    {
        return $this->hasOne(User::class, 'id', 'target_id');
    }

    public function scopeGetList($query)
    {
        $query->join('users', 'users.id', '=', 'comments.user_id')
            ->select(
                'users.name as uName',
                'users.avatar as uFace',
                'users.zone as uHome',
                'comments.id as id',
                'comments.content as content',
                'comments.talk as talk',
                'comments.like as like',
                'comments.user_id as isMe',
                'comments.created_at as time'
            );
    }
}
