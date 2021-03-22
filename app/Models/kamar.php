<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class kamar extends Model
{
    protected $fillable = [
        'id_user','nama_kamar','jenis_kamar','luas_kamar','stok_kamar','harga_kamar','sisa_kamar','bg_foto','ket_lain','ket_biaya','desc','kategori','book','listrik','provinsi_id','provinsi_nama'
    ];

    // protected $with = ['fkamars','fbersamas','users'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->hasMany('App\user','id');
    }

    public function sewas()
    {
        return $this->hasMany('App\sewa','kamar_id','id');
    }

    public function fkamars()
    {
        return $this->hasMany('App\fkamar','id_kamar');
    }

    public function fkamar_mandis()
    {
        return $this->hasMany('App\fkamar_mandi','idkamar_mandi');
    }

    public function fbersamas()
    {
        return $this->hasMany('App\fbersama','idfbersama');
    }

    public function fparkirs()
    {
        return $this->hasMany('App\fparkir','idfparkir');
    }

    public function areas()
    {
        return $this->hasMany('App\area','idarea');
    }

    public function fotokamars()
    {
        return $this->hasMany('App\fotokamar','idfoto');
    }

}
