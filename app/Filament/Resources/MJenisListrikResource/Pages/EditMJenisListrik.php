<?php

namespace App\Filament\Resources\MJenisListrikResource\Pages;

use App\Filament\Resources\MJenisListrikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMJenisListrik extends EditRecord
{
    protected static string $resource = MJenisListrikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
