<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduitResource\Pages;
use App\Filament\Resources\ProduitResource\RelationManagers;
use App\Models\Produit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\filters\SelectFilter;



class ProduitResource extends Resource
{
    protected static ?string $model = Produit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->required(),
            RichEditor::make('description')->label('Description')->columnSpanFull(),
            TextInput::make('prix')->numeric()->required(),
            TextInput::make('stock')->numeric()->required(),
            Select::make('categorie_id')
                ->label('Catégorie')
                ->relationship('categorie', 'nom')
                ->required(),
            FileUpload::make('image')
                ->image()
                ->directory('produits')
                ->preserveFilenames()
                ->label('Image'),
             Select::make('sous_categorie_id')
                ->label('Sous-catégorie')
                ->relationship('sousCategorie', 'nom')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                         ImageColumn::make('image')->label('Image')->circular(),
            TextColumn::make('nom')->searchable(),
            TextColumn::make('categorie.nom')->label('Catégorie')->sortable(),
            TextColumn::make('prix')->money('XOF'),
            TextColumn::make('stock'),
            TextColumn::make('sousCategorie.nom')->label('Sous-catégorie')->sortable(),

            ])
            ->filters([
                SelectFilter::make('categorie')
    ->relationship('categorie', 'nom')
    ->label('Filtrer par catégorie'),
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
            'index' => Pages\ListProduits::route('/'),
            'create' => Pages\CreateProduit::route('/create'),
            'edit' => Pages\EditProduit::route('/{record}/edit'),
        ];
    }
}
