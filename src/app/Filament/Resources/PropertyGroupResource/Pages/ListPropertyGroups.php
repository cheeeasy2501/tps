<?php

namespace App\Filament\Resources\PropertyGroupResource\Pages;

use App\Filament\Resources\PropertyGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPropertyGroups extends ListRecords
{
    protected static string $resource = PropertyGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
