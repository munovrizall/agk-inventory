<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BarangOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Data Barang', Barang::query()->count()),
            Stat::make('Total Data Supplier', Supplier::query()->count()),
            Stat::make('Total Stok Barang', Barang::query()->sum('stok')),
            Stat::make('Total User', User::query()->count()),
        ];
    }
}
