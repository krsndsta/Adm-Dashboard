<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPemakaianListrik extends Model
{
    use HasFactory;
    protected $table = 'trx_pemakaian_listrik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_listrik_id',
        'nilai',
        'dateTime',
    ];
    public function m_jenis_listrik(){
        return $this->belongsTo(MJenisListrik::class,'jenis_listrik_id');
    }
}
