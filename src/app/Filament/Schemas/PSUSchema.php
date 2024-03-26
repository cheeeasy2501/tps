<?php

namespace App\Filament\Schemas;

use App\Enums\Gpu\GpuManufacturerEnum;
use App\Enums\Gpu\InterfaceEnum;
use App\Enums\Gpu\MemoryTypeEnum;
use App\Enums\Gpu\PowerConnectorEnum;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

final class PSUSchema
{
    public static function schema(): array
    {
        return [
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Основное')
                        ->schema([
                            Grid::make(3)->schema([

                            ]),
                        ]),
                    Tabs\Tab::make('Технические характеристики')
                        ->schema([
                            Grid::make(3)->schema([

                            ]),
                        ]),
                ])
        ];
    }
}
