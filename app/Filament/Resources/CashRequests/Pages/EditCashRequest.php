<?php

namespace App\Filament\Resources\CashRequests\Pages;

use App\Filament\Resources\CashRequests\CashRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCashRequest extends EditRecord
{
    protected static string $resource = CashRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
