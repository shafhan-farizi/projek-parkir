<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $guarded = ['id'];
    
    public function jenis() {
        return $this->belongsTo(Jenis::class, 'jenis_kendaraan_id');
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }
}
