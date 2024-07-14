<?php

namespace App\Filament\Resources\SatuanResource\Pages;

use App\Filament\Resources\SatuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSatuans extends ListRecords
{
    protected static string $resource = SatuanResource::class;
    public static ?string $label = 'satuan';

    protected static ?string $title = 'Daftar Satuan';

    protected ?string $subheading = 'Anda dapat membuat, mengubah, dan menghapus satuan disini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Satuan'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/satuan' => 'Satuan',
            '/admin/satuan#' => 'Daftar'
        ];
    }
}
