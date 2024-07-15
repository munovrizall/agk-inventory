<?php

namespace App\Filament\Resources\BarangMasukPendingResource\Pages;

use App\Filament\Resources\BarangMasukPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBarangMasukPending extends CreateRecord
{
    protected static string $resource = BarangMasukPendingResource::class;

    protected static ?string $title = 'Tambah Barang Masuk';

    protected ?string $subheading = 'Anda dapat menambah barang masuk disini';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang-masuk-pending' => 'Barang Masuk',
            '/admin/barang-masuk-pending/create' => 'Tambah'
        ];

    }
}
