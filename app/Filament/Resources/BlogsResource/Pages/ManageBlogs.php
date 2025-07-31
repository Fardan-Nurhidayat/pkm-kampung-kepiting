<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Cache;
use App\Filament\Resources\BlogsResource;
use Filament\Resources\Pages\ManageRecords;

class ManageBlogs extends ManageRecords
{
    protected static string $resource = BlogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->after(function () {
                Cache::forget('blogs');
            }),
        ];
    }
}
