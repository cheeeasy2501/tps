<?php

namespace App\Enums\Gpu;

use Filament\Support\Contracts\HasLabel;

enum InterfaceEnum implements HasLabel
{
    case AGP_3_0_8x;
    case PCI_EXPRESS_x1_2_0;
    case PCI_EXPRESS_x4_3_0;
    case PCI_EXPRESS_x4_4_0;
    case PCI_EXPRESS_x8_2_0;
    case PCI_EXPRESS_x8_3_0;
    case PCI_EXPRESS_x8_4_0;
    case PCI_EXPRESS_x16;
    case PCI_EXPRESS_x16_2_0;
    case PCI_EXPRESS_x16_2_1;
    case PCI_EXPRESS_x16_3_0;
    case PCI_EXPRESS_x16_4_0;
    case PCI_EXPRESS_x16_5_0;

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {
            InterfaceEnum::AGP_3_0_8x => 'AGP 3.0 8x',
            InterfaceEnum::PCI_EXPRESS_x1_2_0 => 'PCI_Express x1 2.0',
            InterfaceEnum::PCI_EXPRESS_x4_3_0 => 'PCI Express x4 3.0',
            InterfaceEnum::PCI_EXPRESS_x4_4_0 => 'PCI Express x4 4.0',
            InterfaceEnum::PCI_EXPRESS_x8_2_0 => 'PCI Express x8 2.0',
            InterfaceEnum::PCI_EXPRESS_x8_3_0 => 'PCI Express x8 3.0',
            InterfaceEnum::PCI_EXPRESS_x8_4_0 => 'PCI Express x8 4.0',
            InterfaceEnum::PCI_EXPRESS_x16 => 'PCI Express x16',
            InterfaceEnum::PCI_EXPRESS_x16_2_0 => 'PCI Express x16 2.0',
            InterfaceEnum::PCI_EXPRESS_x16_2_1 => 'PCI_Express x16 2.1',
            InterfaceEnum::PCI_EXPRESS_x16_3_0 => 'PCI Express x16 3.0',
            InterfaceEnum::PCI_EXPRESS_x16_4_0 => 'PCI Express x16 4.0',
            InterfaceEnum::PCI_EXPRESS_x16_5_0 => 'PCI Express x16 5.0',
        };
    }
}
