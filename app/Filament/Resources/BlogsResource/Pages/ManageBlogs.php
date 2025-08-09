<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Cache;
use App\Filament\Resources\BlogsResource;
use Filament\Notifications\Notification;
use App\Models\Blogs;
use Filament\Resources\Pages\ManageRecords;

class ManageBlogs extends ManageRecords
{
    protected static string $resource = BlogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->before(function (Actions\CreateAction $action, $data) {
                $existingBlog = Blogs::where('slug', $data['slug'])->first();
                if ($existingBlog) {
                    Notification::make()
                        ->title('Judul blog sudah ada')
                        ->body('Silakan gunakan judul blog yang berbeda.')
                        ->danger()
                        ->send();
                    $action->cancel();
                    return []; 
                }
                return $data; 
            })
            ->after(function () {
                Cache::forget('blogs');
            }),
        ];
    }
}
