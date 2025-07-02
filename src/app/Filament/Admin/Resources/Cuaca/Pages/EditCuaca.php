<?php

namespace App\Filament\Admin\Resources\CuacaResource\Pages;

use App\Filament\Admin\Resources\CuacaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuaca extends EditRecord
{
    protected static string $resource = CuacaResource::class;

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
