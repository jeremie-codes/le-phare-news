<?php

namespace App\Filament\Resources\ImageLienResource\Pages;

use App\Filament\Resources\ImageLienResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageLien extends EditRecord
{
    protected static string $resource = ImageLienResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['url'] = ImageLienResource::getImageUrl($data['image'] ?? null);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
