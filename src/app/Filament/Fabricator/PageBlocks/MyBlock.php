<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MyBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('my')
            ->schema([
                \Filament\Forms\Components\RichEditor::make('content')->columnSpanFull(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}