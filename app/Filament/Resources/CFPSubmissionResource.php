<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CFPSubmissionResource\Pages;
use App\Filament\Resources\CFPSubmissionResource\RelationManagers;
use App\Models\CFP;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;


class CFPSubmissionResource extends Resource
{
    protected static ?string $model = CFP::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->required(),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
                TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Textarea::make('description')
                    ->label('Description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title'),
                TextColumn::make('name')
                    ->label('name'),
                TextColumn::make('email')
                    ->label('Email'),
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
            'index' => Pages\ListCFPSubmissions::route('/'),
            'create' => Pages\CreateCFPSubmission::route('/create'),
            'edit' => Pages\EditCFPSubmission::route('/{record}/edit'),
        ];
    }
}
