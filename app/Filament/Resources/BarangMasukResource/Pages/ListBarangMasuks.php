<?php

namespace App\Filament\Resources\BarangMasukResource\Pages;

use App\Filament\Resources\BarangMasukResource;
use App\Models\BarangKeluarPending;
use App\Models\BarangMasuk;
use Barryvdh\DomPDF\PDF;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;

class ListBarangMasuks extends ListRecords
{
    protected static string $resource = BarangMasukResource::class;

    public static ?string $label = 'barang-masuk';

    protected static ?string $title = 'Daftar Barang Masuk';

    protected ?string $subheading = 'Anda dapat melihat barang masuk disini';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('cetakPDF')
                ->label('Cetak Laporan')
                ->color('primary')
                ->icon('heroicon-o-printer')
                ->action(function () {
                    $barangMasuks = BarangMasuk::all();

                    $pdf = app('dompdf.wrapper');
                    $pdf->loadView('pdf.barang_masuk', compact('barangMasuks'));

                    return response()->streamDownload(
                        fn () => print($pdf->stream()),
                        'laporan_barang_masuk.pdf'
                    );
                }),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/laporan-barang-masuk' => 'Barang Masuk',
            '/admin/laporan-barang-masuk#' => 'Laporan'
        ];
    }
}
