<?php

namespace App\Filament\Resources\CategoriesResource\Pages;

use App\Filament\Resources\CategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditCategories extends EditRecord
{
    protected static string $resource = CategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make('delete'),
        ];
    }

    protected function mutateFormDataBeforeCreateSave(array $data): array
    {
        $data['slug'] = Str::slug($data['name']);

        return $data;
    }
}