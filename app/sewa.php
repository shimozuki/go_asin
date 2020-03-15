<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sewa extends Model
{
    protected $fillable = [
        'user_id','kamar_id','lama_sewa','status','notes','stok_id'
    ];

    public function kamar()
    {
        return $this->belongsTo('App\kamar','id');
    }

    public function users()
    {
        return $this->hasMany('App\user','id');
    }
}
