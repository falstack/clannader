<?php

namespace App\Clannader\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'zone', 'avatar', 'banner', 'autograph', 'sex', 'like'
    ];

    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getAvatarAttribute($avatar)
    {
        return $avatar ? 'http://cdn.clannader.com/' . $avatar : 'http://cdn.clannader.com/avatar';
    }

    public function getBannerAttribute($banner)
    {
        return $banner ? 'http://cdn.clannader.com/' . $banner : 'http://cdn.clannader.com/B-banner';
    }

    public function getSexAttribute($sex)
    {
        switch ($sex) {
            case 0:
                $res = '未知';
                break;
            case 1:
                $res = '男';
                break;
            case 2:
                $res = '女';
                break;
            case 3:     // 男,保密
                $res = '保密';
                break;
            case 4:     // 女,保密
                $res = '保密';
                break;
            default:
                $res = '未知';
        }
        return $res;
    }
}
