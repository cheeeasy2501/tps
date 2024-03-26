<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Enums\ItemTypeEnum;
use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListItem extends ListRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make()->label('Все'),
        ];

        foreach (ItemTypeEnum::cases() as $case) {
            $tabs[$case->name] = Tab::make()
                ->label($case->getLabel())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', $case->value));
        }

        return $tabs;
    }
}
