<?php

namespace App\Filament\Admin\Resources\HalamanUtamaResource\Pages;

use App\Filament\Admin\Resources\HalamanUtamaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHalamanUtama extends ListRecords
{
    protected static string $resource = HalamanUtamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
