<?php

namespace App\Filament\Resources\ModuleAccessResource\Pages;

use App\Filament\Resources\ModuleAccessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModuleAccesses extends ListRecords
{
    protected static string $resource = ModuleAccessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
