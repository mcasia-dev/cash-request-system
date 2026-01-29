<?php

namespace App\Filament\Resources\CashRequests;

use App\Filament\Resources\CashRequests\Pages\CreateCashRequest;
use App\Filament\Resources\CashRequests\Pages\EditCashRequest;
use App\Filament\Resources\CashRequests\Pages\ListCashRequests;
use App\Filament\Resources\CashRequests\Schemas\CashRequestForm;
use App\Filament\Resources\CashRequests\Tables\CashRequestsTable;
use App\Models\CashRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CashRequestResource extends Resource
{
    protected static ?string $model = CashRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CashRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CashRequestsTable::configure($table);
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
            'index' => ListCashRequests::route('/'),
            'create' => CreateCashRequest::route('/create'),
            'edit' => EditCashRequest::route('/{record}/edit'),
        ];
    }
}
