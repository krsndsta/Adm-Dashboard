<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenisListrik extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_listrik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    // public $timestamps = false;

    // public function trx_pemakaian_listrik()
    // {
    //     return $this->hasMany(TrxPemakaianListrik::class, 'jenis_listrik_id');
    // }
}
