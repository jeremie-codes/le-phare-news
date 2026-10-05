<?php

namespace App\Filament\Resources\ImageLienResource\Pages;

use App\Filament\Resources\ImageLienResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImageLiens extends ListRecords
{
    protected static string $resource = ImageLienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
