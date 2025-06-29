<?php

namespace App\Filament\Admin\Resources\HeadlineResource\Pages;

use App\Filament\Admin\Resources\HeadlineResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHeadline extends CreateRecord
{
    protected static string $resource = HeadlineResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
