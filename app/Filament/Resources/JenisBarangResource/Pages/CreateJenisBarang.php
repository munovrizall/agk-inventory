<?php

namespace App\Filament\Resources\JenisBarangResource\Pages;

use App\Filament\Resources\JenisBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisBarang extends CreateRecord
{
    protected static string $resource = JenisBarangResource::class;

    protected static ?string $title = 'Tambah Jenis Barang';


    protected ?string $subheading = 'Anda dapat menambah jenis barang disini';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/jenis-barang' => 'Jenis Barang',
            '/admin/jenis-barang/create' => 'Tambah'
        ];

    }
}
