<?php

namespace App\Filament\Admin\Resources\HeadlineResource\Pages;

use App\Filament\Admin\Resources\HeadlineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeadline extends EditRecord
{
    protected static string $resource = HeadlineResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
