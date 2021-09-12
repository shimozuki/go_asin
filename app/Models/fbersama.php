<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fbersama extends Model
{
    protected $fillable = [
        'tanah_id','name'
    ];

    public function kamars()
    {
        return $this->hasMany('App\Models\tanah','tanah_id');
    }
}
