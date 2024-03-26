<?php

namespace App\Enums;

use app\Enums\MetaProperties\Label;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;
use Filament\Support\Contracts\HasLabel;

/**
 * @method string label()
 */
enum ContentEnum: string implements HasLabel
{
    use Names, Values, Metadata;
    case PAGE = 'page';
    case NEWS = 'news';
    case REVIEW = 'review';
    case ARTICLE = 'article';

    #[\Override] public function getLabel(): ?string
    {
        return match ($this) {
            ContentEnum::PAGE => 'Страница',
            ContentEnum::NEWS => 'Новость',
            ContentEnum::REVIEW => 'Обзор',
            ContentEnum::ARTICLE => 'Статья',
        };
    }
}
