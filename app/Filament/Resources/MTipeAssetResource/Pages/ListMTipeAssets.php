<?php

namespace App\Filament\Resources\MTipeAssetResource\Pages;

use App\Filament\Resources\MTipeAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMTipeAssets extends ListRecords
{
    protected static string $resource = MTipeAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
