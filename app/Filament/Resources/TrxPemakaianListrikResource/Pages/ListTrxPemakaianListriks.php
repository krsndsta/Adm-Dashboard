<?php

namespace App\Filament\Resources\TrxPemakaianListrikResource\Pages;

use App\Filament\Resources\TrxPemakaianListrikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrxPemakaianListriks extends ListRecords
{
    protected static string $resource = TrxPemakaianListrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
