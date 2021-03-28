<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'key','transaction_number','user_id','kamar_id','lama_sewa','harga_kamar','harga_total','status','tgl_sewa'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function kamar()
    {
      return $this->belongsTo('App\Models\kamar','kamar_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Models\payment','transaction_id');
    }
}
