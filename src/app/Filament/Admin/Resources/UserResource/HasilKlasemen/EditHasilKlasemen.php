<?php

namespace App\Filament\Admin\Resources\HasilKlasemenResource\Pages;

use App\Filament\Admin\Resources\HasilKlasemenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilKlasemen extends EditRecord
{
    protected static string $resource = HasilKlasemenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
