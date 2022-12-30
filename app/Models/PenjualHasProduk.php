<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenjualHasProduk extends Model
{
    public $table = 'penjualan_has_produk';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'id',
        'penjual_id',
        'produk_id',
        'Qty',
        'harga'
    ];

    public function penjual(){
        return $this->belongsTo(Penjualan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }




}
