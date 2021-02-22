<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;


class User extends Authenticatable
{
    use Notifiable, UsesUuid;

    protected function get_users_roles_id(){
        $roles = \App\Models\roles::where('name', 'user')->first();
        return $roles->id;
    }

    public static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $model->roles_id = $model->get_users_roles_id();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        if ($this->roles_id == $this->get_users_roles_id()){
            return false;
        }

        return true;
    }
}
