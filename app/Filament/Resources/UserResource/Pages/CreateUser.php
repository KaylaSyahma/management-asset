<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $role = Role::findByName($data['role']); // ambil role dari nama
        $data['role_id'] = $role->id;            // masukin ke kolom role_id
        return $data;
    }

    protected function afterCreate(): void
    {
        if ($this->data['role']) {
            $this->record->assignRole($this->data['role']);
        }
    }
}