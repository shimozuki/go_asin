<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id','nama_bank','nama_pemilik','nomor_rekening','nomor_ktp','tlp'
    ];

    public function User()
    {
      return $this->belongsTo(User::class);
    }


}
