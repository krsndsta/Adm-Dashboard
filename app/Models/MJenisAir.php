<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenisAir extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_air';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    public $timestamps = false;

    // public function trx_pemakaian_air()
    // {
    //     return $this->hasMany(TrxPemakaianAir::class, 'jenis_air_id');
    // }
}
