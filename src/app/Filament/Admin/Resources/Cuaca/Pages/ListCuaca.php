<?php

namespace App\Filament\Admin\Resources\CuacaResource\Pages;

use App\Filament\Admin\Resources\CuacaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuacas extends ListRecords
{
    protected static string $resource = CuacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
