<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBarang extends EditRecord
{
    protected static string $resource = BarangResource::class;

    protected ?string $subheading = 'Anda dapat mengubah barang disini';


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
            '/admin/barang' => 'Barang',
            $record->getKey() => 'Edit'
        ];

    }
}
