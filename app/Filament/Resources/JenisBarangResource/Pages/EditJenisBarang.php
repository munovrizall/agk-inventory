<?php

namespace App\Filament\Resources\JenisBarangResource\Pages;

use App\Filament\Resources\JenisBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisBarang extends EditRecord
{
    protected static string $resource = JenisBarangResource::class;

    protected ?string $subheading = 'Anda dapat mengubah jenis barang disini';



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
            '/admin/jenis-barang' => 'Jenis Barang',
            $record->getKey() => 'Edit'
        ];

    }
}
