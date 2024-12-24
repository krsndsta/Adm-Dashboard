<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class TrxAsset extends Model
{
    use HasFactory;
    protected $table = 'trx_asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'dateTime',
        'jenis_pemantauan',
        'jumlah_baik',
        'jumlah_kurang_baik'
    ];

    public function trxAssetDetails()
    {
        return $this->hasMany(TrxAssetDetail::class, 'pemantauan_id');
    }
}
