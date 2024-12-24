<?php

namespace App\Filament\Resources\TrxAssetResource\Pages;

use App\Filament\Resources\TrxAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrxAssets extends ListRecords
{
    protected static string $resource = TrxAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
