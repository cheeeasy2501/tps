<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MyBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('my')
            ->schema([
                \Filament\Forms\Components\TextInput::make('heading')
                    ->label('Заголовок')
                    ->required()
                    ->maxLength(100),
                \Filament\Forms\Components\RichEditor::make('content')
                ->label('Текст'),
                Repeater::make('images')
                    ->label('Блок картинок')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Картинка')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('360')
                            ->imageResizeTargetHeight('240'),
                    ])
                    ->required()
                    ->defaultItems(3)
                    ->addable(false)
                    ->deletable(false),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $images = $data['images'];

        $result = [];
        array_walk_recursive($images, function ($item) use (&$result) {
            $result[] = url(Storage::url($item));
        });

        $data['images'] = $result;

        return $data;
    }
}
