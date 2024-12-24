<?php

namespace App\Filament\Resources\TrxAssetResource\Pages;

use App\Filament\Resources\TrxAssetResource;
use App\Models\TrxAssetDetail;
use Filament\Resources\Pages\CreateRecord;

class CreateTrxAsset extends CreateRecord
{
    protected static string $resource = TrxAssetResource::class;

    protected function afterCreate()
    {
        $record = $this->record;
        $data = $this->data;

        $arrayData = [];
        foreach ($data['assets'] as $assetData) {
            $dataID = $assetData['id'];
            $arrayData[] = [
                'pemantauan_id' => $record->id,
                'asset_id' => $dataID,
                'status' => $data["assets[$dataID][status]"]
            ];
        }

        TrxAssetDetail::insert($arrayData);
    }
}
