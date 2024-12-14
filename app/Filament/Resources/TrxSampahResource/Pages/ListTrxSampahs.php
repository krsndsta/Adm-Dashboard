<?php

namespace App\Filament\Resources\TrxSampahResource\Pages;

use App\Filament\Resources\TrxSampahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrxSampahs extends ListRecords
{
    protected static string $resource = TrxSampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
