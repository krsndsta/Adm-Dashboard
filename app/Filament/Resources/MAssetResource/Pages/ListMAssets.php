<?php

namespace App\Filament\Resources\MAssetResource\Pages;

use App\Filament\Resources\MAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMAssets extends ListRecords
{
    protected static string $resource = MAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
