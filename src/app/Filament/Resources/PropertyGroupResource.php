<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyGroupResource\Pages;
use App\Filament\Resources\PropertyGroupResource\RelationManagers;
use App\Models\PropertyGroup;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PropertyGroupResource extends Resource
{
    protected static ?string $model = PropertyGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
