<?php

namespace App\Clannader\Models\Morph;

use App\Clannader\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['about_id', 'about_type', 'from_id', 'from_type', 'target_id', 'attack_id', 'read'];

    public function about()
    {
        return $this->morphTo();
    }

    public function from()
    {
        return $this->morphTo();
    }

    public function target()
    {
        return $this->hasOne(User::class, 'id', 'target_id');
    }

    public function attack()
    {
        return $this->belongsTo(User::class, 'attack_id', 'id');
    }
}
