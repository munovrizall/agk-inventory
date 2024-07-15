<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangMasukPendingResource\Pages;
use App\Filament\Resources\BarangMasukPendingResource\RelationManagers;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangMasukPending;
use App\Models\Supplier;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BarangMasukPendingResource extends Resource
{
    protected static ?string $model = BarangMasukPending::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    protected static ?string $navigationLabel = 'Barang Masuk';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('supplier_id')
                    ->required()
                    ->label('Nama Supplier')
                    ->options(Supplier::all()->pluck('nama_supplier', 'id'))
                    ->searchable()
                    ->placeholder('Pilh Supplier'),
                Select::make('barang_id')
                    ->required()
                    ->label('Nama Barang')
                    ->options(Barang::all()->pluck('nama_barang', 'id'))
                    ->searchable()
                    ->placeholder('Pilih Barang'),
                Forms\Components\TextInput::make('jumlah_masuk')
                    ->required()
                    ->label('Jumlah Barang Masuk')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255)
                    ->placeholder('Masukkan jumlah barang masuk'),
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('barangId.nama_barang')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),
                Tables\Columns\TextColumn::make('supplierId.nama_supplier')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Supplier'),
                Tables\Columns\TextColumn::make('jumlah_masuk')
                    ->searchable()
                    ->sortable()
                    ->label('Jumlah Barang'),
                Tables\Columns\TextColumn::make('userId.name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Penginput'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('konfirmasi')
                    ->name('konfirmasi')
                    ->label('Konfirmasi Transaksi')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->authorize(function (BarangMasukPending $record) {
                        return auth()->user()->can('konfirmasi', $record);
                    })
                    ->action(function (BarangMasukPending $record) {
                        // Pindahkan data dari barang_keluar_pending ke barang_keluar
                        $barangMasuk = BarangMasuk::create([
                            'barang_id' => $record->barang_id,
                            'supplier_id' => $record->supplier_id,
                            'jumlah_masuk' => $record->jumlah_masuk,
                            'tanggal_masuk' => $record->created_at,
                        ]);

                        // Kurangi stok barang
                        $barang = Barang::findOrFail($record->barang_id);
                        $barang->stok += $record->jumlah_masuk;
                        $barang->save();

                        // Hapus data dari barang_keluar_pending
                        $record->delete();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangMasukPendings::route('/'),
            'create' => Pages\CreateBarangMasukPending::route('/create'),
        ];
    }

    public static function getSlug(): string
    {
        return 'barang-masuk-pending';
    }

}
