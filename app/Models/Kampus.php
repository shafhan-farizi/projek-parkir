<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampus';
    protected $guarded = ['id'];

    public function area_parkir() {
        return $this->hasMany(AreaParkir::class);
    }
}
