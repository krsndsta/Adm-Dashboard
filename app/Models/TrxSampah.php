<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxSampah extends Model
{
    use HasFactory;
    protected $table = 'trx_sampah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kenaikan_sampah_organik',
        'kenaikan_sampah_anorganik',
        'total_sampah',
        'dateTime',
    ];
}
