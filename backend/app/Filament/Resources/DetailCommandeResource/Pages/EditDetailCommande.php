<?php

namespace App\Filament\Resources\DetailCommandeResource\Pages;

use App\Filament\Resources\DetailCommandeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailCommande extends EditRecord
{
    protected static string $resource = DetailCommandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
