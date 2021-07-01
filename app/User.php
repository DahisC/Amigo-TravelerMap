<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function maps()
    {
        return $this->hasMany('App\Map');
    }
    public function attractions()
    {
        return $this->belongsToMany('App\Attraction', 'user_attraction', 'user_id', 'attraction_id')->withTimestamps();
    }
    static function favorites()
    {
        if (auth()->check()) {
            // return User::with('attractions')->find(auth()->user()->id)->attractions->pluck('id');
            return User::with([
                'attractions',
                'attractions.images',
                'attractions.position',
                'attractions.time',
                'attractions.tags'
            ])->find(auth()->user()->id)->attractions;
        } else {
            return [];
        }
    }
    static function personalMaps()
    {
        if (auth()->check()) {
            // return User::with('attractions')->find(auth()->user()->id)->attractions->pluck('id');
            return User::with('maps')->find(auth()->user()->id)->maps;
        } else {
            return [];
        }
    }
}
