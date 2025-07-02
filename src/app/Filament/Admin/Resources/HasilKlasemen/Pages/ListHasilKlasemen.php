<?php

namespace App\Filament\Admin\Resources\KlasemenTimResource\Pages;

use App\Filament\Admin\Resources\KlasemenTimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKlasemenTim extends ListRecords
{
    protected static string $resource = KlasemenTimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
