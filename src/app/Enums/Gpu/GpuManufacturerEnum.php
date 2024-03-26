<?php

namespace App\Enums\Gpu;

use Filament\Support\Contracts\HasLabel;

enum GpuManufacturerEnum
{
    case AMD;
    case NVIDIA;
    case Intel;

}
