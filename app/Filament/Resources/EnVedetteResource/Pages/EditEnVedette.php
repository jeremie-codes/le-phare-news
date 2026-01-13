<?php

namespace App\Filament\Resources\EnVedetteResource\Pages;

use App\Filament\Resources\EnVedetteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnVedette extends EditRecord
{
    protected static string $resource = EnVedetteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
