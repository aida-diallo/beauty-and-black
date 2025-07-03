<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailCommandeResource\Pages;
use App\Filament\Resources\DetailCommandeResource\RelationManagers;
use App\Models\DetailCommande;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class DetailCommandeResource extends Resource
{
    protected static ?string $model = DetailCommande::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('commande_id')
                ->relationship('commande', 'id')
                ->label('Commande')
                ->required(),
            Select::make('produit_id')
                ->relationship('produit', 'nom')
                ->label('Produit')
                ->required(),
            TextInput::make('quantite')
                ->numeric()
                ->required(),
            TextInput::make('prix_unitaire')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                     TextColumn::make('commande.id')->label('Commande'),
            TextColumn::make('produit.nom')->label('Produit'),
            TextColumn::make('quantite'),
            TextColumn::make('prix_unitaire')->money('XOF'),
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
            'index' => Pages\ListDetailCommandes::route('/'),
            'create' => Pages\CreateDetailCommande::route('/create'),
            'edit' => Pages\EditDetailCommande::route('/{record}/edit'),
        ];
    }
}
