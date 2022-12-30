<?php

namespace App\Models;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;
    public $table = 'karyawan';
    public function penjualan(){
        return $this->hasMany(Penjualan::class);
    }

}
