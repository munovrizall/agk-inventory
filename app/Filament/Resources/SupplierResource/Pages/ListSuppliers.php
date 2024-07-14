<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    public static ?string $label = 'supplier';

    protected static ?string $title = 'Daftar Supplier';

    protected ?string $subheading = 'Anda dapat membuat, mengubah, dan menghapus supplier disini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ Supplier'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/supplier' => 'Supplier',
            '/admin/supplier#' => 'Daftar'
        ];
    }
}
