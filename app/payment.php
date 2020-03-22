<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'sewa_id','approve_by','penyewa_id','nama_pengirim','nama_bank','tgl_kirim','status_pembayaran','bukti_pembayaran','no_rek_pengirim','jml_payment'
    ];
}
