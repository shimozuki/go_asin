<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class kamar extends Model
{
    protected $fillable = [
        'id_user','nama_kamar','jenis_kamar','luas_kamar','stok_kamar','harga_kamar'
    ];

    public function users()
    {
        return $this->belongsTo(user::class);
    }
    
    public function fkamars()
    {
        return $this->hasMany(fkamar::class);
    }

    public function fkamar_mandis()
    {
        return $this->hasMany(fkamar_mandi::class);
    }

    public function fbersamas()
    {
        return $this->hasMany(fbersama::class);
    }

    public function parkirs()
    {
        return $this->hasMany(parkir::class);
    }

    public function areas()
    {
        return $this->hasMany(area::class);
    }
}
