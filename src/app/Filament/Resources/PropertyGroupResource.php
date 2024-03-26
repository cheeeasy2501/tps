<?php

namespace App\Filament\Resources;

use App\Enums\PropertyEnum;
use App\Filament\Resources\PropertyGroupResource\Pages;
use App\Filament\Resources\PropertyGroupResource\RelationManagers;
use App\Models\PropertyGroup;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Symfony\Component\Console\Input\Input;

class PropertyGroupResource extends Resource
{
    protected static ?string $model = PropertyGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('type')
                    ->options(PropertyEnum::class)
                    ->live()
                    ->required(),

                \Filament\Forms\Components\Checkbox::make('is_required')
                    ->visible(fn(Get $get): bool => in_array($get('type'),
                        [PropertyEnum::SELECT->value, PropertyEnum::INPUT->value])
                    ),
                \Filament\Forms\Components\Repeater::make('values')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('value')
                    ])
                    ->visible(fn(Get $get): bool => in_array($get('type'),
                        [PropertyEnum::SELECT->value])
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPropertyGroups::route('/'),
            'create' => Pages\CreatePropertyGroup::route('/create'),
            'edit' => Pages\EditPropertyGroup::route('/{record}/edit'),
        ];
    }
}
