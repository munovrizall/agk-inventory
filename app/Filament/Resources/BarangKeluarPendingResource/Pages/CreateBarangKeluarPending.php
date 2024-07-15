<?php

namespace App\Filament\Resources\BarangKeluarPendingResource\Pages;

use App\Filament\Resources\BarangKeluarPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBarangKeluarPending extends CreateRecord
{
    protected static string $resource = BarangKeluarPendingResource::class;

    protected static ?string $title = 'Tambah Barang Keluar';

    protected ?string $subheading = 'Anda dapat menambah barang keluar disini';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang-keluar-pending' => 'Barang Keluar',
            '/admin/barang-keluar-pending/create' => 'Tambah'
        ];

    }
}
