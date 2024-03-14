<?php

namespace App\Database\Mock;
trait СategoryMock
{
    public function categoriesMock(): array
    {
        return [
            1 => 'Видеокарты',
            2 => 'Блоки питания'
        ];
    }
}
