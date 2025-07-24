<?php

namespace App\Filament\Resources\ConditionResource\Pages;

use App\Filament\Resources\ConditionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCondition extends CreateRecord
{
    protected static string $resource = ConditionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        return $data;
    }
}
