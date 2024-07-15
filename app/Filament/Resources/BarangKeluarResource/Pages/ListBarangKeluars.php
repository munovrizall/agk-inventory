<?php

namespace App\Filament\Resources\BarangKeluarResource\Pages;

use App\Filament\Resources\BarangKeluarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangKeluars extends ListRecords
{
    protected static string $resource = BarangKeluarResource::class;

    public static ?string $label = 'barang-keluar';

    protected static ?string $title = 'Daftar Barang Keluar';

    protected ?string $subheading = 'Anda dapat melihat barang keluar disini';

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/laporan-barang-keluar' => 'Barang Keluar',
            '/admin/laporan-barang-keluar#' => 'Laporan'
        ];
    }
}
