<?php

namespace App\Filament\Resources\CFPSubmissionResource\Pages;

use App\Filament\Resources\CFPSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCFPSubmission extends EditRecord
{
    protected static string $resource = CFPSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
