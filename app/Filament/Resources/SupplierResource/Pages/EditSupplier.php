<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplier extends EditRecord
{
    protected static string $resource = SupplierResource::class;
    protected ?string $subheading = 'Anda dapat mengubah supplier disini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
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
            '/admin/supplier' => 'Supplier',
            $record->getKey() => 'Edit'
        ];

    }
}
