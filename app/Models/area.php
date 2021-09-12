<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $fillable = [
        'idarea','area_name'
    ];


    public function tanahs()
    {
        return $this->hasMany('App\Models\tanah','id_tanah');
    }
}
