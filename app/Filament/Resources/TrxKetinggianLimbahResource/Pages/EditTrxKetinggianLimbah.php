<?php

namespace App\Filament\Resources\TrxKetinggianLimbahResource\Pages;

use App\Filament\Resources\TrxKetinggianLimbahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrxKetinggianLimbah extends EditRecord
{
    protected static string $resource = TrxKetinggianLimbahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
