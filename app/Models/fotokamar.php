<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fotokamar extends Model
{
    protected $fillable = [
        'idfoto','foto_kamar'
    ];

    public function kamars()
    {
        return $this->hasMany('App\kamar','id_kamar');
    }
}
