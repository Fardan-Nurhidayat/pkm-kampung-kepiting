<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Cache;
use App\Filament\Resources\GaleriResource;
use Filament\Resources\Pages\ManageRecords;

class ManageGaleris extends ManageRecords
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->after(function () {
                // Clear the cache after creating a new Galeri
                Cache::forget('galeris');
            }),
        ];
    }
}
