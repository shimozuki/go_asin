<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fbersama extends Model
{
    protected $fillable = [
        'idfbersama','fbersama_name'
    ];

    public function kamars()
    {
        return $this->hasMany(kamar::class);
    }
}
