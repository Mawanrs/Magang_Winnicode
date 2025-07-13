<?php

namespace App\Filament\Admin\Resources\HasilBalapanResource\Pages;

use App\Filament\Admin\Resources\HasilBalapanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilBalapan extends EditRecord
{
    protected static string $resource = HasilBalapanResource::class;

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
