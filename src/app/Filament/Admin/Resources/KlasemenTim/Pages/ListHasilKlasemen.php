<?php

namespace App\Filament\Admin\Resources\HasilKlasemenResource\Pages;

use App\Filament\Admin\Resources\HasilKlasemenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilKlasemen extends ListRecords
{
    protected static string $resource = HasilKlasemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
