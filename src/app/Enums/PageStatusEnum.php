<?php

namespace App\Enums;

use ArchTech\Enums\From;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum PageStatusEnum: string
{
    use InvokableCases, Names, Values, Options, From;
    case DRAFT = 'draft';
    case INACTIVATE = 'inactive';
    case ACTIVE = 'active';
}
