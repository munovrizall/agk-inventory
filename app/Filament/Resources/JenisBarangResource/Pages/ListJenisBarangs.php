<?php

namespace App\Filament\Resources\JenisBarangResource\Pages;

use App\Filament\Resources\JenisBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisBarangs extends ListRecords
{
    protected static string $resource = JenisBarangResource::class;

    public static ?string $label = 'jenis-barang';

    protected static ?string $title = 'Daftar Jenis Barang';

    protected ?string $subheading = 'Anda dapat membuat, mengubah, dan menghapus jenis barang disini';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Jenis Barang'),

        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/jenis-barang' => 'Jenis Barang',
            '/admin/jenis-barang#' => 'Daftar'
        ];
    }
}
