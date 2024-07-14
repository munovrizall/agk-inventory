<?php

namespace App\Filament\Resources\BarangResource\Pages;

use App\Filament\Resources\BarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangs extends ListRecords
{
    protected static string $resource = BarangResource::class;
    public static ?string $label = 'barang';

    protected static ?string $title = 'Daftar Barang';

    protected ?string $subheading = 'Anda dapat membuat, mengubah, dan menghapus barang disini';



    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Barang'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/barang' => 'Barang',
            '/admin/barang#' => 'Daftar'
        ];
    }
}
