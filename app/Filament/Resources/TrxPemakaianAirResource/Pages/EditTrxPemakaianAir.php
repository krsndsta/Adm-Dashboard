<?php

namespace App\Filament\Resources\TrxPemakaianAirResource\Pages;

use App\Filament\Resources\TrxPemakaianAirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrxPemakaianAir extends EditRecord
{
    protected static string $resource = TrxPemakaianAirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
