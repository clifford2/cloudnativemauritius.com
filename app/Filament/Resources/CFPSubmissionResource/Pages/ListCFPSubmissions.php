<?php

namespace App\Filament\Resources\CFPSubmissionResource\Pages;

use App\Filament\Resources\CFPSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCFPSubmissions extends ListRecords
{
    protected static string $resource = CFPSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
