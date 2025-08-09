<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Cache;
use App\Filament\Resources\ReviewResource;
use Filament\Resources\Pages\ManageRecords;

class ManageReviews extends ManageRecords
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->after(function () {
                // Clear the cache after creating a new Review
                Cache::forget('reviews');
            }),
        ];
    }
}
