<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class kamar extends Model
{
    protected $fillable = [
        'user_id','nama_kamar','jenis_kamar','luas_kamar','stok_kamar','harga_kamar','sisa_kamar','bg_foto','ket_lain','ket_biaya','desc','kategori','book','listrik','provinsi_id','provinsi_nama'
    ];

    // protected $with = ['fkamars','fbersamas','users'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
