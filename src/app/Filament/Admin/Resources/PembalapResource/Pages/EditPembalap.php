<?php

namespace App\Filament\Admin\Resources\PembalapResource\Pages;

use App\Filament\Admin\Resources\PembalapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembalap extends EditRecord
{
    protected static string $resource = PembalapResource::class;

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
