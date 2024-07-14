<?php

namespace App\Filament\Resources\SatuanResource\Pages;

use App\Filament\Resources\SatuanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSatuan extends CreateRecord
{
    protected static string $resource = SatuanResource::class;

    protected static ?string $title = 'Tambah Satuan';


    protected ?string $subheading = 'Anda dapat menambah satuan disini';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/satuan' => 'Satuan',
            '/admin/satuan/create' => 'Create'
        ];

    }
}
