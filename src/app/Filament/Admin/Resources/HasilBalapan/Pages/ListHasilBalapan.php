<?php

namespace App\Filament\Admin\Resources\HasilBalapanResource\Pages;

use App\Filament\Admin\Resources\HasilBalapanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilBalapan extends ListRecords
{
    protected static string $resource = HasilBalapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
