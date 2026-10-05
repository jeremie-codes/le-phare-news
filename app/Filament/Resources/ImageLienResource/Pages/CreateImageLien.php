<?php

namespace App\Filament\Resources\ImageLienResource\Pages;

use App\Filament\Resources\ImageLienResource;
use Filament\Resources\Pages\CreateRecord;

class CreateImageLien extends CreateRecord
{
    protected static string $resource = ImageLienResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['url'] = ImageLienResource::getImageUrl($data['image'] ?? null);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
