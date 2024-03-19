<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Illuminate\Database\Eloquent\Builder;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Pages extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('pages')
            ->schema([
                \Filament\Forms\Components\TextInput::make('count-of-posts')
                    ->label('Последнии посты')
                    ->numeric()
                ->required()
                ->default(10),
                \Filament\Forms\Components\Select::make('pages-type')
//                ->options(fn(Builder $builder) => dd($builder))

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
