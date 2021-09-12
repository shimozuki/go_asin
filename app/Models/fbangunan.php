<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Model\tanah;

class fbangunan extends Model
{
    protected $fillable = [
        'tanah_id','name'
    ];

    public function tanahs()
    {
        return $this->belongsTo(tanah::class);
    }
}

