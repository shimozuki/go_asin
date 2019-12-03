<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $fillable = [
        'idarea','area_name'
    ];

    public function kamars()
    {
        return $this->hasMany(kamar::class);
    }
}
