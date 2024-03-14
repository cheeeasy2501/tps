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
            'Sapphire',
            'PowerColor',
            'ZOTAC',
            'ASUS',
            'MSI',
            'Gigabyte',
            'EVGA',
            'NVIDIA',
            'AMD',
            'PNY',
            'Palit',
            'Gainward',
            'Galax',
            'XFX',
            'Leadtek',
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
