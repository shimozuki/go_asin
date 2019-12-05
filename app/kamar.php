<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class kamar extends Model
{
    protected $fillable = [
        'id_user','nama_kamar','jenis_kamar','luas_kamar','stok_kamar','harga_kamar'
    ];

    public function users()
    {
        return $this->belongsTo(user::class);
    }

    public function fkamars()
    {
        return $this->hasMany('App\fkamar','id_kamar');
    }

    public function fkamar_mandis()
    {
        return $this->hasMany('App\fkamar_mandi','idkamar_mandi');
    }

    public function fbersamas()
    {
        return $this->hasMany('App\fbersama','idfbersama');
    }

    public function fparkirs()
    {
        return $this->hasMany('App\fparkir','idfparkir');
    }

    public function areas()
    {
        return $this->hasMany('App\area','idarea');
    }
}
