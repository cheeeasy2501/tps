<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PropertyEnum: string implements HasLabel
{

    case INPUT = 'input';
    case SELECT = 'select';

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {
            PropertyEnum::INPUT => 'Текстовое поле',
            PropertyEnum::SELECT => 'Селект'
        };
    }
}
