<?php

namespace App\Filament\Resources\ConditionResource\Pages;

use App\Filament\Resources\ConditionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditCondition extends EditRecord
{
    protected static string $resource = ConditionResource::class;
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
