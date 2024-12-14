<?php

namespace App\Filament\Resources\MTipeAssetResource\Pages;

use App\Filament\Resources\MTipeAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMTipeAsset extends EditRecord
{
    protected static string $resource = MTipeAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
