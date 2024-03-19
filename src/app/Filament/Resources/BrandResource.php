<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;
    protected static ?string $modelLabel = 'Бренд';
    protected static ?string $pluralModelLabel = 'Бренды';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Бренд')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Категория')
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('official_website')
                    ->label('Официальный вебсайт'),
                Forms\Components\TextInput::make('country_of_origin')
                    ->label('Страна основания'),
                Forms\Components\DatePicker::make('year_founded')
                    ->label('Год основания')
                    ->maxDate(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Бренд')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country_of_origin')
                    ->label('Страна основания'),
                Tables\Columns\TextColumn::make('year_founded')
                    ->label('Год основания')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload()

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\CreateBrand::class,
            Pages\EditBrand::class,
            Pages\ListBrands::class,
        ]);
    }
}
