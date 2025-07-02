<?php

namespace App\Filament\Admin\Resources\HasilBalapanResource\Pages;

use App\Filament\Admin\Resources\HasilBalapanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHasilBalapan extends CreateRecord
{
    protected static string $resource = HasilBalapanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
