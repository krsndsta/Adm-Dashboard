<?php

namespace App\Filament\Resources\TrxPemakaianListrikResource\Pages;

use App\Filament\Resources\TrxPemakaianListrikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrxPemakaianListrik extends EditRecord
{
    protected static string $resource = TrxPemakaianListrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
