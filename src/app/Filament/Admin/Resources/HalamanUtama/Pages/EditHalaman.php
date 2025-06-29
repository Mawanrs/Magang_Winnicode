<?php

namespace App\Filament\Admin\Resources\HalamanUtamaResource\Pages;

use App\Filament\Admin\Resources\HalamanUtamanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHalamanUtama extends EditRecord
{
    protected static string $resource = HalamanUtamaResource::class;

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
