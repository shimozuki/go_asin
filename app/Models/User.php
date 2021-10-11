<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    public function routeNotificationForTelegram()
    {
        return $this->user_id;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','credit'
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

    public function tanah()
    {
        return $this->hasOne(tanah::class);
    }

    public function datauser()
    {
      return $this->hasOne(DataUser::class);
    }

    public function payment()
    {
      return $this->hasOne(payment::class);
    }

    public function transaksi()
    {
      return $this->hasOne(Transaction::class);
    }

    public function testimoni()
    {
      return $this->hasOne(Testimoni::class);
    }

}
