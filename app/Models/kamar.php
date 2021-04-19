<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    protected $fillable = [
        'user_id','nama_kamar','jenis_kamar','luas_kamar','stok_kamar','harga_kamar','sisa_kamar','bg_foto','ket_lain','ket_biaya','desc','kategori','book','listrik','provinsi_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function fkamar()
    {
      return $this->hasMany(fkamar::class);
    }

    public function kmandi()
    {
      return $this->hasMany(fkamar_mandi::class);
    }

    public function fbersama()
    {
      return $this->hasMany(fbersama::class);
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
      return $this->hasOne('App\Models\payment','kamar_id');
    }

    public function provinsi()
    {
      return $this->hasOne('App\Models\provinsi','kode','provinsi_id');
    }

    public function transaksi()
    {
      return $this->hasOne('App\Models\Transaction','kamar_id');
    }

}
