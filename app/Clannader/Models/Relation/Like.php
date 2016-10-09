<?php

namespace App\Clannader\Models\Relation;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'link_type', 'link_id'];

    public function link()
    {
        return $this->morphTo();
    }
}
