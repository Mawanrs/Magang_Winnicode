<?php

namespace App\Filament\Admin\Resources\KlasemenTimResource\Pages;

use App\Filament\Admin\Resources\KlasemenTimResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKlasemenTim extends CreateRecord
{
    protected static string $resource = KlasemenTimResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
