<?php

namespace App\Filament\Resources\StokBarangResource\Pages;

use App\Filament\Resources\StokBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStokBarangs extends ListRecords
{
    protected static string $resource = StokBarangResource::class;

    protected static ?string $title = 'Daftar Stok Barang';

    protected ?string $subheading = 'Anda dapat  mengubah, stok barang disini';

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/stok-barang' => 'Stok Barang',
            '/admin/stok-barang#' => 'Daftar'
        ];
    }
}