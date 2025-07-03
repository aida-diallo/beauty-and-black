<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SousCategorieResource\Pages;
use App\Filament\Resources\SousCategorieResource\RelationManagers;
use App\Models\SousCategorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class SousCategorieResource extends Resource
{
    protected static ?string $model = SousCategorie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->required(),
        Select::make('categorie_id')
            ->label('Catégorie parente')
            ->relationship('categorie', 'nom')
            ->required(),
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
            'index' => Pages\ListSousCategories::route('/'),
            'create' => Pages\CreateSousCategorie::route('/create'),
            'edit' => Pages\EditSousCategorie::route('/{record}/edit'),
        ];
    }
}
