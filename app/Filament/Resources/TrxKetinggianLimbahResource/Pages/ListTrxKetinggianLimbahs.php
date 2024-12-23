<?php

namespace App\Filament\Resources\TrxKetinggianLimbahResource\Pages;

use App\Filament\Resources\TrxKetinggianLimbahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrxKetinggianLimbahs extends ListRecords
{
    protected static string $resource = TrxKetinggianLimbahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
