<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTipeAsset extends Model
{
    use HasFactory;
    protected $table = 'm_tipe_asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tipe_asset',
        'deskripsi',
    ];

    public function assets()
    {
        return $this->hasMany(MAsset::class, 'tipe_asset_id');
    }
}
