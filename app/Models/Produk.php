<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $table = 'produk';
    public $timestamps = false;
    protected $guarded = ['id'];
    public function penjualanHasProduk(){
        return $this->hasMany(penjualanHasProduk::class);
    }
    
}
