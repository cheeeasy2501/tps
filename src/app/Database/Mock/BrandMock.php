<?php

namespace App\Database\Mock;
trait BrandMock
{
    public function allBrands(): array
    {
        return array_merge(
            $this->videoCardBrandMock(),
            $this->processorBrandMock()
        );
    }
    public function videoCardBrandMock(): array
    {
        return [
            1 => 'Sapphire',
            2 => 'PowerColor',
            3 => 'ZOTAC',
            4 => 'ASUS',
            5 => 'MSI',
            6 => 'Gigabyte',
            7 => 'EVGA',
            8 => 'NVIDIA',
            9 => 'AMD',
            10 => 'PNY',
            11 => 'Palit',
            12 => 'Gainward',
            13 => 'Galax',
            14 => 'XFX',
            15 => 'Leadtek',
        ];
    }

    public function processorBrandMock(): array
    {
        return [
            'AMD',
            'Intel'
        ];
    }
}
