<?php

namespace App\Filament\Admin\Resources\HeadlineResource\Pages;

use App\Filament\Admin\Resources\HeadlineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeadline extends ListRecords
{
    protected static string $resource = HeadlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
