<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fotokamar extends Model
{
    protected $fillable = [
        'tanah_id','foto_tanah'
    ];

    
    public function tanahs()
    {
        return $this->hasMany('App\Models\tanah','id_tanah');
    }
}
