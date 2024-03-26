<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ItemTypeEnum: string implements HasLabel
{
    case GPU = 'gpu';

    case PSU = 'psu';

    #[\Override] public function getLabel(): ?string
    {
        return match($this) {
            ItemTypeEnum::GPU => 'Видеокарты',
            ItemTypeEnum::PSU => 'Блоки питания'
        };
    }
}
