<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use App\Models\Project;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->description('Total number of user registered')
                ->chart([1, 20, 15, 40, 15, 10, 5])
                ->color('success'),

            Stat::make('Total Project', Project::count())
                ->descriptionIcon('heroicon-o-clipboard-document-list', IconPosition::Before)
                ->description('Total number of project ')
                ->chart([1, 20, 40])
                ->color('info'),

            Stat::make('Total Brand Mobil', Brand::whereHas('category', function ($query) {
                $query->where('name', 'mobil');
            })->count())
                ->description('Total brand dengan kategori mobil')
                ->descriptionIcon('heroicon-o-clipboard-document-list', IconPosition::Before)
                ->color('info')
                ];
            }
}
