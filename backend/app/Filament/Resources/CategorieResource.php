<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorieResource\Pages;
use App\Filament\Resources\CategorieResource\RelationManagers;
use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class CategorieResource extends Resource
{
    protected static ?string $model = Categorie::class;

   protected static ?string $navigationIcon = 'heroicon-o-tag';
   protected static ?string $navigationGroup = 'Catalogue';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('nom')
                    ->required()
                    ->label('Nom de la catégorie')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                  TextColumn::make('nom')
                    ->label('Catégorie')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('produits_count')
                    ->label('Produits')
                    ->counts('produits')
                    ->sortable(),
            ])
            ->defaultSort('nom')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategorie::route('/create'),
            'edit' => Pages\EditCategorie::route('/{record}/edit'),
        ];
    }
}
