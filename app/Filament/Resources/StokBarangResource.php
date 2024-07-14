<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokBarangResource\Pages;
use App\Filament\Resources\StokBarangResource\RelationManagers;
use App\Models\Barang;
use App\Models\StokBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokBarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Stok Barang';

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationParentItem = 'Data Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stok')
                    ->required()
                    ->label('Jumlah Stok Barang')
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stok')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListStokBarangs::route('/'),
            'edit' => Pages\EditStokBarang::route('/{record}/edit'),
        ];
    }

    public static function getSlug(): string
    {
        return 'stok-barang';
    }
}
