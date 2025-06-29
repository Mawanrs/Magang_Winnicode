<?php

namespace App\Filament\Admin\Resources\PembalapResource\Pages;

use App\Filament\Admin\Resources\PembalapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembalap extends ListRecords
{
    protected static string $resource = PembalapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
