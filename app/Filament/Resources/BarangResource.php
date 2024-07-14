<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationLabel = 'Data Barang';
    protected static ?string $navigationGroup = 'Data Master';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_barang')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama barang'),
                Forms\Components\Select::make('jenis_id')
                    ->label('Jenis Barang')
                    ->relationship('jenisBarang', 'nama_jenis')
                    ->required()
                    ->placeholder('Pilih jenis barang'),
                Forms\Components\Select::make('satuan_id')
                    ->label('Satuan')
                    ->relationship('satuan', 'nama_satuan')
                    ->required()
                    ->placeholder('Pilih satuan barang'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenisBarang.nama_jenis')
                    ->label('Jenis Barang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('satuan.nama_satuan')
                    ->label('Satuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }

    public static function getSlug(): string
    {
        return 'barang';
    }
}
