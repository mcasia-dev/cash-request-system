<?php
namespace App\Filament\Resources\CashRequests\Schemas;

use App\Enums\NatureOfRequestEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class CashRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::id()),

                Select::make('nature_of_request')
                    ->options(NatureOfRequestEnum::filamentOptions())
                    ->live()
                    ->required(),

                TextInput::make('activity_name')
                    ->label('Activity Name')
                    ->required(),

                DatePicker::make('activity_date')
                    ->label('Activity Date')
                    ->minDate(now())
                    ->required(),

                TextInput::make('activity_venue')
                    ->label('Activity Venue')
                    ->required(),

                TextInput::make('requesting_amount')
                    ->label('Requesting Amount')
                    ->prefix('₱')
                    ->required()
                    ->numeric()
                    ->maxValue(fn($get) => $get('nature_of_request') === NatureOfRequestEnum::PETTY_CASH->value ? 1500 : null),

                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('attachments'),

                Textarea::make('purpose')
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }
}
