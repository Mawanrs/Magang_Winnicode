<?php

namespace App\Filament\Admin\Resources\LoginResource\Pages;

use App\Filament\Admin\Resources\LoginResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogin extends EditRecord
{
    protected static string $resource = LoginResource::class;

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
