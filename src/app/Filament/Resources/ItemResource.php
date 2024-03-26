<?php

namespace App\Filament\Resources;

use App\Enums\ItemTypeEnum;
use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Filament\Schemas\GPUSchema;
use App\Filament\Schemas\PSUSchema;
use App\Models\Item;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Комплектующие';
    protected static ?string $pluralModelLabel = 'Комплектующие';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Название')
                    ->required(),

                \Filament\Forms\Components\Select::make('brand_id')
                    ->label('Бренд')
                    ->relationship('brand', 'name')
                    ->required(),

                \Filament\Forms\Components\TextInput::make('year_of_release')
                    ->label('Год выпуска')
                    ->integer()
                    ->required(),

                \Filament\Forms\Components\Checkbox::make('active')
                    ->label('Активно'),

                Select::make('type')
                    ->label('Тип комплектующего')
                    ->required()
                    ->options(ItemTypeEnum::class)
                    ->disabledOn('edit')
                    ->live()
                    ->afterStateUpdated(fn (Select $component) => $component
                        ->getContainer()
                        ->getComponent('dynamicTypeFields')
                        ->getChildComponentContainer()
                        ->fill()),

                Section::make('Параметры')
                    ->label('Параметры')
                    ->statePath('properties')
                    ->schema(fn (Get $get): array => match ($get('type')) {
                        ItemTypeEnum::GPU->value => GPUSchema::schema(),
                        ItemTypeEnum::PSU->value => PSUSchema::schema(),
                        default => [],
                    })
                    ->key('dynamicTypeFields')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название'),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Бренд'),
                Tables\Columns\TextColumn::make('year_of_release')
                    ->label('Год выпуска'),
                Tables\Columns\CheckboxColumn::make('active')
                    ->label('Активно')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Изменить'),
                Tables\Actions\ViewAction::make()
                ->label('Просмотреть'),
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
            'index' => Pages\ListItem::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
