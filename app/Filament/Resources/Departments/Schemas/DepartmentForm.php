<?php
namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_name')
                    ->required(),

                TextInput::make('department_head')
                    ->required(),

                Hidden::make('added_by')
                    ->default(fn() => Auth::user()->name),
            ]);
    }
}
