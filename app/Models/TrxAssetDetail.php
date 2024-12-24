<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxAssetDetail extends Model
{
    use HasFactory;
    protected $table = 'trx_asset_detail';
    protected $fillable = [
        'pemantauan_id',
        'asset_id',
        'status'
    ];
    public $timestamps = false;

    public function trxAsset()
    {
        return $this->belongsTo(TrxAsset::class, 'pemantauan_id');
    }
    public function mAsset()
    {
        return $this->belongsTo(MAsset::class, 'asset_id');
    }
}
