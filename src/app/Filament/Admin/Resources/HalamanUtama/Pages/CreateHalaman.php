<?php

namespace App\Filament\Admin\Resources\HalamanUtamaResource\Pages;

use App\Filament\Admin\Resources\HalamanutamaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHalamanUtama extends CreateRecord
{
    protected static string $resource = HalamanUtamaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
