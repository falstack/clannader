<?php

namespace App\Clannader\Models\Morph;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeline extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'link_id', 'link_type', 'type', 'content'];

    public function link()
    {
        return $this->morphTo();
    }
}
