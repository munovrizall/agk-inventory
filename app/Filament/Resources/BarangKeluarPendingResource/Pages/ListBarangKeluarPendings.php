<?php

namespace App\Filament\Resources\BarangKeluarPendingResource\Pages;

use App\Filament\Resources\BarangKeluarPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangKeluarPendings extends ListRecords
{
    protected static string $resource = BarangKeluarPendingResource::class;

    public static ?string $label = 'barang-keluar-pending';

    protected static ?string $title = 'Daftar Barang Keluar';

    protected ?string $subheading = 'Anda dapat membuat barang keluar disini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Barang Keluar'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang-keluar-pending' => 'Barang Keluar',
            '/admin/barang-keluar-pending#' => 'Daftar'
        ];
    }
}
