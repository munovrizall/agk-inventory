<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangKeluarPendingResource\Pages;
use App\Filament\Resources\BarangKeluarPendingResource\RelationManagers;
use App\Models\Barang;
use App\Models\BarangKeluarPending;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;

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
                    ->placeholder('Pilih Barang'),
                Forms\Components\TextInput::make('jumlah_keluar')
                    ->required()
                    ->label('Jumlah Barang Keluar')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255)
                    ->placeholder('Masukkan jumlah barang keluar'),
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
                Tables\Columns\TextColumn::make('jumlah_keluar')
                ->searchable()
                ->sortable()
                ->label('Jumlah Barang'),
                Tables\Columns\TextColumn::make('dikonfirmasi')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    '1' => 'success',
                    '0' => 'danger',
                })
                ->formatStateUsing(fn (string $state): string => __($state == 1 ? "Terkonfirmasi" : "Belum Dikonfirmasi")),
                Tables\Columns\TextColumn::make('userId.name')
                ->searchable()
                ->sortable()
                ->label('Nama Penginput'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
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
