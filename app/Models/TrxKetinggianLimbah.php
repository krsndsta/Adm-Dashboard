<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxKetinggianLimbah extends Model
{
    use HasFactory;
    protected $table = 'trx_ketinggian_limbah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nilai',
        'dateTime',
    ];
}
