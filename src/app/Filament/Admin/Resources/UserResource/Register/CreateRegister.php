<?php

namespace App\Filament\Admin\Resources\RegisterResource\Pages;

use App\Filament\Admin\Resources\RegisterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegister extends CreateRecord
{
    protected static string $resource = RegisterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
