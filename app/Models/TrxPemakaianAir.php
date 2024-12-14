<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPemakaianAir extends Model
{
    use HasFactory;
    protected $table = 'trx_pemakaian_air';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_air_id',
        'nilai',
        'dateTime',
    ];
    public function m_jenis_air(){
        return $this->belongsTo(MJenisAir::class,'jenis_air_id');
    }
}
