<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fkamar extends Model
{
    protected $fillable = [
        'id_kamar','fkamar_name'
    ];

    public function kamars()
    {
        return $this->hasMany('App\kamar','id_kamar');
    }
}
