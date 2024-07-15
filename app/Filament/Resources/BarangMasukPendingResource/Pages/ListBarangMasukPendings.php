<?php

namespace App\Filament\Resources\BarangMasukPendingResource\Pages;

use App\Filament\Resources\BarangMasukPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangMasukPendings extends ListRecords
{
    protected static string $resource = BarangMasukPendingResource::class;

    public static ?string $label = 'barang-masuk-pending';

    protected static ?string $title = 'Daftar Barang Masuk';

    protected ?string $subheading = 'Anda dapat membuat barang masuk disini';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Barang Masuk'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang-masuk-pending' => 'Barang Masuk',
            '/admin/barang-masuk-pending#' => 'Daftar'
        ];
    }
}
