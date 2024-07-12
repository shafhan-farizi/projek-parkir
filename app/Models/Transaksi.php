<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class);
    }

    public function area_parkir() {
        return $this->belongsTo(AreaParkir
        ::class);
    }
}
