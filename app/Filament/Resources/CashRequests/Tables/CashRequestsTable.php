<?php
namespace App\Filament\Resources\CashRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CashRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),

                TextColumn::make('activity_name')
                    ->label('Activity Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('activity_date')
                    ->label('Activity Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('nature_of_request')
                    ->label('Nature of Request')
                    ->sortable()
                    ->badge(),

                TextColumn::make('requesting_amount')
                    ->label('Requesting Amount')
                    ->money('PHP')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('due_date')
                    ->label('Due Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('status')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
