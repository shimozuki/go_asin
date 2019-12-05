<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fparkir extends Model
{
    protected $fillable = [
        'idfparkir','fparkir_name'
    ]; 

    public function kamars()
    {
        return $this->hasMany('App\kamar','id_kamar');
    }
}
