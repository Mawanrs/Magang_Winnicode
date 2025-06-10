<?php

namespace App\Filament\Admin\Resources\JadwalPertandinganResource\Pages;

use App\Filament\Admin\Resources\JadwalPertandinganResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJadwalPertandingan extends CreateRecord
{
    protected static string $resource = JadwalPertandinganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
