<?php

namespace App\Filament\Admin\Resources\RegisterResource\Pages;

use App\Filament\Admin\Resources\RegisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegister extends ListRecords
{
    protected static string $resource = RegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
