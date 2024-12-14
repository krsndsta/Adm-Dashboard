<?php

namespace App\Filament\Resources\TrxPemakaianAirResource\Pages;

use App\Filament\Resources\TrxPemakaianAirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrxPemakaianAirs extends ListRecords
{
    protected static string $resource = TrxPemakaianAirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
