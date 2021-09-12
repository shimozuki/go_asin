<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tanah extends Model
{
    protected $fillable = [
        'user_id','nama','luas','stok','harga_sewa','sisa','bg_foto','ket_lain','ket_biaya','desc','kategori','book','provinsi_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function fbangunan()
    {
      return $this->hasMany(fbangunan::class);
    }

    public function kmandi()
    {
      return $this->hasMany(fkamar_mandi::class);
    }

    public function fbersama()
    {
      return $this->hasMany(fbersama::class);
    }

    public function fotokamar()
    {
        return $this->hasMany(fotokamar::class);
    }

    public function fparkir()
    {
      return $this->hasMany(fparkir::class);
    }

    public function area()
    {
      return $this->hasMany(area::class);
    }

    public function datauser()
    {
      return $this->belongsTo('App\Models\DataUser','user_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Models\payment','tanah_id');
    }

    public function provinsi()
    {
      return $this->hasOne('App\Models\provinsi','kode','provinsi_id');
    }

    public function transaksi()
    {
      return $this->hasOne('App\Models\Transaction','tanah_id');
    }
}
