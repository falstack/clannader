<?php

namespace App\Clannader\Models\Bangumi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bangumi extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'summary', 'avatar', 'banner', 'follower', 'score'];
}
