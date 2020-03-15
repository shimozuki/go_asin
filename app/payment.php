<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'sewa_id','approve_by','penyewa_id','status_pembayaran','bukti_pembayaran'
    ];
}
