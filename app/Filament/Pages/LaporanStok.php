<?php

namespace App\Filament\Pages;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Builder;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\Action;

class LaporanStok extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = 'Stok Barang';

    protected ?string $subheading = 'Anda dapat melihat stok barang disini';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationLabel = 'Stok Barang';
    protected static ?string $navigationGroup = 'Laporan';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.laporan-stok';

    protected function getTableQuery(): Builder
    {
        return Barang::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('nama_barang')
                ->label('Nama Barang')
                ->searchable()
                ->sortable(),
            TextColumn::make('stok')
                ->label('Stok')
                ->sortable(),
            // Tambahkan kolom lain sesuai kebutuhan
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->hasRole(['Kepala Gudang', 'Staff Gudang']);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('cetakPDF')
                ->label('Cetak Laporan')
                ->color('primary')
                ->icon('heroicon-o-printer')
                ->action(function () {
                    $stokBarangs = Barang::all();

                    $pdf = app('dompdf.wrapper');
                    $pdf->loadView('pdf.stok_barang', compact('stokBarangs'));

                    return response()->streamDownload(
                        fn () => print($pdf->stream()),
                        'laporan_stok_barang.pdf'
                    );
                }),
        ];
    }
}
