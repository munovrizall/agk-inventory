<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;

    protected static ?string $title = 'Tambah Barang';

    protected ?string $subheading = 'Anda dapat menambah barang disini';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang' => 'Barang',
            '/admin/barang/create' => 'Tambah'
        ];

    }
}
