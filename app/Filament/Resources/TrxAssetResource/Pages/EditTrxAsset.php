<?php

namespace App\Filament\Resources\TrxAssetResource\Pages;

use App\Filament\Resources\TrxAssetResource;
use App\Models\TrxAssetDetail;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrxAsset extends EditRecord
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

        TrxAssetDetail::where('pemantauan_id', $record->id)->delete();
        TrxAssetDetail::insert($arrayData);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
