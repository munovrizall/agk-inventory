<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangKeluarPendingResource\Pages;
use App\Filament\Resources\BarangKeluarPendingResource\RelationManagers;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangKeluarPending;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class BarangKeluarPendingResource extends Resource
{
    protected static ?string $model = BarangKeluarPending::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    protected static ?string $navigationLabel = 'Barang Keluar';
    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('barang_id')
                    ->required()
                    ->label('Nama Barang')
                    ->options(Barang::all()->pluck('nama_barang', 'id'))
                    ->searchable()
                    ->placeholder('Pilih Barang')
                    ->reactive() // This makes the field reactive to changes
                    ->afterStateUpdated(function ($state, callable $set) {
                        $barang = Barang::find($state);
                        if ($barang) {
                            $set('stok', $barang->stok);
                        } else {
                            $set('stok', 0); // Atau nilai default lainnya jika barang tidak ditemukan
                        }
                    }),
                Forms\Components\TextInput::make('stok')
                    ->label('Stok Barang Tersedia')
                    ->disabled() 
                    ->reactive(),
                Forms\Components\TextInput::make('jumlah_keluar')
                    ->required()
                    ->label('Jumlah Barang Keluar')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255)
                    ->placeholder('Masukkan jumlah barang keluar'),
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),
            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('barangId.nama_barang')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),
                Tables\Columns\TextColumn::make('jumlah_keluar')
                    ->searchable()
                    ->sortable()
                    ->label('Jumlah Barang'),
                Tables\Columns\TextColumn::make('userId.name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Penginput'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Keluar')
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
                    ->authorize(function (BarangKeluarPending $record) {
                        return auth()->user()->can('konfirmasi', $record);
                    })
                    ->action(function (BarangKeluarPending $record) {
                        // Pindahkan data dari barang_keluar_pending ke barang_keluar
                        $barangKeluar = BarangKeluar::create([
                            'barang_id' => $record->barang_id,
                            'jumlah_keluar' => $record->jumlah_keluar,
                            'tanggal_keluar' => $record->created_at,
                        ]);

                        // Kurangi stok barang
                        $barang = Barang::findOrFail($record->barang_id);
                        $barang->stok -= $record->jumlah_keluar;
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
            'index' => Pages\ListBarangKeluarPendings::route('/'),
            'create' => Pages\CreateBarangKeluarPending::route('/create'),
        ];
    }

    public static function getSlug(): string
    {
        return 'barang-keluar-pending';
    }
}
