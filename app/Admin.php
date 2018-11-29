<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class Admin extends Authenticatable
{

    use Notifiable;

    protected $guard = 'admin';
    protected $table ='admins';

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


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function lastSeen() {
        $redis = Redis::connection();
        return $redis->get('last_seen_' . $this->id);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
