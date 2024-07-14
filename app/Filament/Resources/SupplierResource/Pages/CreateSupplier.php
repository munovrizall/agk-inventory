<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSupplier extends CreateRecord
{
    protected static string $resource = SupplierResource::class;

    protected static ?string $title = 'Tambah Supplier';


    protected ?string $subheading = 'Anda dapat menambah supplier disini';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/supplier' => 'Supplier',
            '/admin/supplier/create' => 'Tambah'
        ];

    }
}
