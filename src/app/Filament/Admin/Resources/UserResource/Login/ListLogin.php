<?php

namespace App\Filament\Admin\Resources\LoginResource\Pages;

use App\Filament\Admin\Resources\LoginResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogin extends ListRecords
{
    protected static string $resource = LoginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
