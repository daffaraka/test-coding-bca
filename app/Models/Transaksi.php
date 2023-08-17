<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nominal',
        'jenis',
        'tanggal',
        'waktu',
        'saldo_id'
    ];

    public function saldo(){
        return $this->belongsTo(Saldo::class,'saldo_id');
    }
}
