<?php

namespace App\Filament\Resources\BarangKeluarResource\Pages;

use App\Filament\Resources\BarangKeluarResource;
use App\Models\BarangKeluar;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;


class ListBarangKeluars extends ListRecords
{
    protected static string $resource = BarangKeluarResource::class;

    public static ?string $label = 'barang-keluar';

    protected static ?string $title = 'Daftar Barang Keluar';

    protected ?string $subheading = 'Anda dapat melihat barang keluar disini';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('cetakPDF')
                ->label('Cetak Laporan')
                ->color('primary')
                ->icon('heroicon-o-printer')
                ->action(function () {
                    $barangKeluars = BarangKeluar::all();

                    $pdf = app('dompdf.wrapper');
                    $pdf->loadView('pdf.barang_keluar', compact('barangKeluars'));

                    return response()->streamDownload(
                        fn () => print($pdf->stream()),
                        'laporan_barang_keluar.pdf'
                    );
                }),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/laporan-barang-keluar' => 'Barang Keluar',
            '/admin/laporan-barang-keluar#' => 'Laporan'
        ];
    }
}
