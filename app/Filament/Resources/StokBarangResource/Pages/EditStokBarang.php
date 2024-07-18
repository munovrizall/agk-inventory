<?php

namespace App\Filament\Resources\StokBarangResource\Pages;

use App\Filament\Resources\StokBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStokBarang extends EditRecord
{
    protected static string $resource = StokBarangResource::class;
    
    protected ?string $subheading = 'Anda dapat mengubah stok barang disini';


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
            '/admin/stok-barang' => 'Stok Barang',
            $record->getKey() => 'Edit'
        ];

    }
}