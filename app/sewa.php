<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sewa extends Model
{
    protected $fillable = [
        'user_id','kamar_id','lama_sewa','status','start','end','tgl_book','notes','jenis','pemilik_id','nama_kamar','harga_kamar','nama_bank','no_rek','invoice','nama_user','nama_pemilik','email_user','email_pemilik'
    ];

    public function kamar()
    {
        return $this->belongsTo('App\kamar','id');
    }

    public function users()
    {
        return $this->hasMany('App\user','id');
    }
}
