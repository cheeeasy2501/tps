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

final class GPUSchema
{
    public static function schema(): array
    {
        return [
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Основное')
                        ->schema([
                            Grid::make(3)->schema([
                                Select::make('interface')
                                    ->label('Интерфейс')
                                    ->searchable()
                                    ->options(InterfaceEnum::class),
                                Select::make('gpu_manufacturer')
                                    ->label('Производитель ГП')
                                    ->searchable()
                                    ->options(GpuManufacturerEnum::class),
                                TextInput::make('gpu_micro_architecture')
                                    ->label('Микроархитектура'),
                            ]),
                        ]),
                    Tabs\Tab::make('Технические характеристики')
                        ->schema([
                            Grid::make(3)->schema([
                                TextInput::make('base_gpu_frequency')
                                    ->label('Базовая частота ГП (МГц)')
                                    ->integer(),
                                TextInput::make('max_gpu_frequency')
                                    ->label('Масимальная частота ГП (МГц)')
                                    ->integer(),
                                TextInput::make('memory_size')
                                    ->label('Память (ГБ)')
                                    ->integer(),
                                Select::make('memory_type')
                                    ->label('Тип памяти')
                                    ->searchable()
                                    ->options(MemoryTypeEnum::class),
                                TextInput::make('memory_frequency')
                                    ->label('Частота памяти (МГц)')
                                    ->integer(),
                                TextInput::make('number_of_rt_cores')
                                    ->label('Количество RT-ядер')
                                    ->integer(),
                                TextInput::make('number_of_processor')
                                    ->label('Количество потоковых процессоров')
                                    ->integer(),
                                TextInput::make('memory_bandwidth')
                                    ->label('Пропускная способность памяти (ГБ/с)')
                                    ->integer(),
                                TextInput::make('memory_bus_width')
                                    ->label('Ширина шины памяти (бит)')
                                    ->integer(),
                                Select::make('power_connector')
                                    ->label('Коннектор питания')
                                    ->searchable()
                                    ->options(PowerConnectorEnum::class),
                            ]),
                        ]),
                    Tabs\Tab::make('Интерфейс')
                        ->schema([
                            Fieldset::make('VGA (D-Sub)')
                                ->schema([
                                    Toggle::make('vga_dsab_exist')
                                        ->label('Наличие VGA (D-Sub)')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->live(),
                                    TextInput::make('vga_dsab_count')
                                        ->label('Количество')
                                        ->disabled(fn(Get $get): bool => !$get('vga_dsab_exist')),


                                ]),
                            Fieldset::make('HDMI')
                                ->schema([
                                    Toggle::make('hdmi_exist')
                                        ->label('Наличие HDMI')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->live(),
                                    Grid::make()
                                        ->schema([
                                            TextInput::make('hdmi_version')
                                                ->label('Версия')
                                                ->disabled(fn(Get $get): bool => !$get('hdmi_exist')),
                                            TextInput::make('hdmi_count')
                                                ->label('Количество')
                                                ->integer()
                                                ->disabled(fn(Get $get): bool => !$get('hdmi_exist'))
                                        ])
                                ]),
                            Fieldset::make('DisplayPort')
                                ->schema([
                                    Toggle::make('display_port_exist')
                                        ->label('Наличие HDMI')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->live(),
                                    Grid::make()
                                        ->schema([
                                            TextInput::make('hdmi_version')
                                                ->label('Версия')
                                                ->disabled(fn(Get $get): bool => !$get('display_port_exist')),
                                            TextInput::make('hdmi_count')
                                                ->label('Количество')
                                                ->integer()
                                                ->disabled(fn(Get $get): bool => !$get('display_port_exist'))
                                        ])
                                ]),
                        ])
                ])
        ];
    }
}
