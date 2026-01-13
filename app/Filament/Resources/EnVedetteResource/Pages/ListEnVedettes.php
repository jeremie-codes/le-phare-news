<?php

namespace App\Filament\Resources\EnVedetteResource\Pages;

use App\Filament\Resources\EnVedetteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnVedettes extends ListRecords
{
    protected static string $resource = EnVedetteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
