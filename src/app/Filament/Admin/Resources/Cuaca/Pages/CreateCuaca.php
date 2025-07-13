<?php

namespace App\Filament\Admin\Resources\CuacaResource\Pages;

use App\Filament\Admin\Resources\CuacaResource;
use Filament\Resources\Pages\CreateRecord;

    class CreateCuaca extends CreateRecord
    {
        protected static string $resource = CuacaResource::class;

        protected function getRedirectUrl(): string
        {
            return $this->getResource()::getUrl('index');
        }
    }
