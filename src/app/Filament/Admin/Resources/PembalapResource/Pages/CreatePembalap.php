<?php

namespace App\Filament\Admin\Resources\PembalapResource\Pages;

use App\Filament\Admin\Resources\PembalapResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePembalap extends CreateRecord
{
    protected static string $resource = PembalapResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
