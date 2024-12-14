<?php

namespace App\Filament\Resources\MAssetResource\Pages;

use App\Filament\Resources\MAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMAsset extends EditRecord
{
    protected static string $resource = MAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
