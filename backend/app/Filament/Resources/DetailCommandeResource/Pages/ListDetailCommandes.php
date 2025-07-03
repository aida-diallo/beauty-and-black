<?php

namespace App\Filament\Resources\DetailCommandeResource\Pages;

use App\Filament\Resources\DetailCommandeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailCommandes extends ListRecords
{
    protected static string $resource = DetailCommandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
