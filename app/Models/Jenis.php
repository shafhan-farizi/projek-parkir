<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $guarded = ['id'];

    public function kendaraan() {
        return $this->hasMany(Kendaraan::class);
    }
}
