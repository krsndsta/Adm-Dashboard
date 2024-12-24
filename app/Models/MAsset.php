<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAsset extends Model
{
    use HasFactory;
    protected $table = 'm_asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'tipe_asset_id',
    ];
    // public $timestamps = false;

    public function m_tipe_asset()
    {
        return $this->belongsTo(MTipeAsset::class, 'tipe_asset_id');
    }
    public function trxAssetDetails()
    {
        return $this->hasMany(TrxAssetDetail::class, 'asset_id');
    }
}
