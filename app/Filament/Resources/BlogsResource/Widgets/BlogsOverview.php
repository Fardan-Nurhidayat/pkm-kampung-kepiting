<?php

namespace App\Filament\Resources\BlogsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Blogs;
class BlogsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Blogs' , fn () => Blogs::count())
                ->label('Total Blogs')
                ->color('primary')
                ->icon('heroicon-o-document-text')
                ->description('Jumlah total blog yang telah dibuat.'),
            Stat::make('Total Products', fn() => \App\Models\Product::count())
                ->label('Total Products')
                ->color('primary')
                ->icon('heroicon-o-cube')
                ->description('Jumlah total produk yang telah ditambahkan.'),
            Stat::make('Total Users', fn() => \App\Models\User::role('user')->count())
                ->label('Total Users')
                ->color('primary')
                ->icon('heroicon-o-users')
                ->description('Jumlah total pengguna yang terdaftar.'),
        ];
    }
}
