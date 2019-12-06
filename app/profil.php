<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $fillable = [
        'user_id','nama_bank','no_rek','no_telp','no_ktp','no_npwp','foto'
    ];

}
