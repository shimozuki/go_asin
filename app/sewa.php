<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sewa extends Model
{
    protected $fillable = [
        'user_id','kamar_id','lama_sewa','status','notes','stok_id'
    ];

    public function kamars()
    {
        return $this->hasMany('App\kamar','id_kamar');
    }

    public function users()
    {
        return $this->hasMany('App\user','id');
    }
}
