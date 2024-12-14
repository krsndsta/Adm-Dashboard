<?php

namespace App\Filament\Resources\MJenisAirResource\Pages;

use App\Filament\Resources\MJenisAirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMJenisAirs extends ListRecords
{
    protected static string $resource = MJenisAirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
