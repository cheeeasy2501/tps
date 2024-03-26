<?php

namespace App\Enums\Gpu;

use Filament\Support\Contracts\HasLabel;

enum PowerConnectorEnum implements HasLabel
{
    case NO;
    case _6_PIN;
    case _8_PIN;
    case _12_PIN;
    case _16_PIN;

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {

            PowerConnectorEnum::NO => 'Нет',
            PowerConnectorEnum::_6_PIN => '6 PIN',
            PowerConnectorEnum::_8_PIN => '8 PIN',
            PowerConnectorEnum::_12_PIN => '12 PIN',
            PowerConnectorEnum::_16_PIN => '16 PIN (PCIe Gen5)',

        };
    }
}
