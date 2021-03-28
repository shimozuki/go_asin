<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
      'transaction_id','user_id','kamar_id','type_transfer','nama_bank','nama_pemilik','nomor_rekening','status','jumlah_bayar','bank_tujuaan','tgl_transfer'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
      return $this->hasOne(Transaction::class);
    }
}
