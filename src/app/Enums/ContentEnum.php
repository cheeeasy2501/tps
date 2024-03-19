<?php

namespace App\Enums;

use app\Enums\MetaProperties\Label;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

/**
 * @method string label()
 */
enum ContentEnum: string
{
    use Names, Values, Metadata;
//    #[Label('Новость')]
    case PAGE = 'page';
    case NEWS = 'news';
//    #[Label('Обзор')]
    case REVIEW = 'review';
//    #[Label('Статья')]
    case ARTICLE = 'article';


    public static function asLabels(): array
    {
        return [
          ContentEnum::PAGE->value => 'Страница',
          ContentEnum::NEWS->value => 'Новость',
          ContentEnum::REVIEW->value => 'Обзор',
          ContentEnum::ARTICLE->value => 'Статья',
        ];
    }
}
