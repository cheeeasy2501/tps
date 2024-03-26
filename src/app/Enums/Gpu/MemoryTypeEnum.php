<?php

namespace App\Enums\Gpu;

use Filament\Support\Contracts\HasLabel;

enum MemoryTypeEnum implements HasLabel
{
    case DDR2;
    case DDR3;
    case DDR4;
    case GDDR3;
    case GDDR4;
    case GDDR5;
    case GDDR5X;
    case GDDR6;
    case GDDR6X;
    case HBM2;
    case HBM2E;

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {
            MemoryTypeEnum::DDR2 => 'DDR2',
            MemoryTypeEnum::DDR3 => 'DDR3',
            MemoryTypeEnum::DDR4 => 'DDR4',
            MemoryTypeEnum::GDDR3 => 'GDDR3',
            MemoryTypeEnum::GDDR4 => 'GDDR4',
            MemoryTypeEnum::GDDR5 => 'GDDR5',
            MemoryTypeEnum::GDDR5X => 'GDDR5X',
            MemoryTypeEnum::GDDR6 => 'GDDR6',
            MemoryTypeEnum::GDDR6X => 'GDDR6X',
            MemoryTypeEnum::HBM2 => 'HBM2',
            MemoryTypeEnum::HBM2E => 'HBM2e',
        };
    }

}
