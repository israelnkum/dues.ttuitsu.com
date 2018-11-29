<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    protected $table ='users';

    protected $appends = ['lastSeen'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'username','phoneNumber', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function lastSeen() {
        $redis = Redis::connection();
        return $redis->get('last_seen_' . $this->id);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
