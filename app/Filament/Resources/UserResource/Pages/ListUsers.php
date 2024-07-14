<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    public static ?string $label = 'user';

    protected static ?string $title = 'Daftar Pengguna';

    protected ?string $subheading = 'Anda dapat membuat, mengubah, dan menghapus pengguna sistem disini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('+ User'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/users' => 'Pengguna',
            '/admin/users#' => 'Daftar'
        ];
    }
}
