<?php

namespace App\Filament\Resources\ModuleAccessResource\Pages;

use App\Filament\Resources\ModuleAccessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModuleAccess extends EditRecord
{
    protected static string $resource = ModuleAccessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
