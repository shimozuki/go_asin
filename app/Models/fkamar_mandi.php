<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fkamar_mandi extends Model
{
    protected $fillable = [
        'tanah_id','name'
    ];

    public function tanahs()
    {
        return $this->hasMany('App\tanah','id_tanah');
    }
}
