<?php

namespace App\Clannader\Models\Morph;

use App\Clannader\Models\Relation\Like;
use App\Clannader\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

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
}
