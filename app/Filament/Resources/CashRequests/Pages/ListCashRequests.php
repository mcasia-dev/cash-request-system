<?php

namespace App\Filament\Resources\CashRequests\Pages;

use App\Filament\Resources\CashRequests\CashRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCashRequests extends ListRecords
{
    protected static string $resource = CashRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
