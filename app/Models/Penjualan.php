<?php

namespace App\Models;

use App\Models\Karyawan;
use App\Models\PenjualHasProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tgl',
        'karyawan_id'
    ];

    public $timestamps = false;
    public $table = 'penjualan';

    public function karyawan(){
        return $this->belongsTo(Karyawan::class);
    }

    public function penjualanHasProduk(){
        return $this->hasMany(PenjualHasProduk::class);
    }


}
