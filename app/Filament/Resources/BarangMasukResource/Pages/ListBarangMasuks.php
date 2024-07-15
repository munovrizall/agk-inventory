<?php

namespace App\Filament\Resources\BarangMasukResource\Pages;

use App\Filament\Resources\BarangMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangMasuks extends ListRecords
{
    protected static string $resource = BarangMasukResource::class;

    public static ?string $label = 'barang-masuk';

    protected static ?string $title = 'Daftar Barang Masuk';

    protected ?string $subheading = 'Anda dapat melihat barang masuk disini';

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/laporan-barang-masuk' => 'Barang Masuk',
            '/admin/laporan-barang-masuk#' => 'Laporan'
        ];
    }
}
