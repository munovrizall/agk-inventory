<?php

namespace App\Filament\Resources\SatuanResource\Pages;

use App\Filament\Resources\SatuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSatuan extends EditRecord
{
    protected static string $resource = SatuanResource::class;


    protected ?string $subheading = 'Anda dapat mengubah satuan disini';


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

   
    public function getBreadcrumbs(): array
    {
        $record = $this->getRecord();
        return [
            '/admin/satuan' => 'Satuan',
            $record->getKey() => 'Edit'
        ];

    }
}
