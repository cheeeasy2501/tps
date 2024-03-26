<?php

namespace App\Enums;

//D	C	B	A	S	S+
use Filament\Support\Contracts\HasLabel;

enum TableTierEnum implements HasLabel
{
    case S_PLUS;
    case S;
    case A;
    case B;
    case C;
    case D;
    case WITHOUT;

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {
            TableTierEnum::S_PLUS => 'S+',
            TableTierEnum::S => 'S',
            TableTierEnum::A => 'A',
            TableTierEnum::B => 'B',
            TableTierEnum::C => 'C',
            TableTierEnum::D => 'D',
            TableTierEnum::WITHOUT => 'Нет',
        };
    }
}
