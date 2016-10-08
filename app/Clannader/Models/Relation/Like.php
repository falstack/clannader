<?php

namespace App\Clannader\Models\Relation;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'likeable_type', 'likeable_id'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
