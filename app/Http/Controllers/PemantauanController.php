<?php

namespace App\Http\Controllers;

use App\Models\TrxAssetDetail;
use Illuminate\Http\Request;

class PemantauanController extends Controller
{
    public function createTrxAssetDetail($data)
    {
        $pemantauanId = $data['id'];
        $assets = $data['assets'] ?? [];

        foreach ($assets as $assetId => $assetData) {
            $status = $assetData['kondisi'];

            TrxAssetDetail::create([
                'pemantauan_id' => $pemantauanId,
                'asset_id' => $assetData['id'],
                'status' => $status,
            ]);
        }
    }
}
