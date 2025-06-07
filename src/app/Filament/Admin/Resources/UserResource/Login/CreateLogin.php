<?php

namespace App\Filament\Admin\Resources\LoginResource\Pages;

use App\Filament\Admin\Resources\LoginResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLogin extends CreateRecord
{
    protected static string $resource = LoginResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
