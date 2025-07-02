<?php

namespace App\Filament\Admin\Resources\HasilKlasemenResource\Pages;

use App\Filament\Admin\Resources\HasilKlasemenResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHasilKlasemen extends CreateRecord
{
    protected static string $resource = HasilKlasemenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
