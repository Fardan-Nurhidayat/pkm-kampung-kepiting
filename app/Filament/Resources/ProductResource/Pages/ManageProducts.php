<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Notifications\Notification;
class ManageProducts extends ManageRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (Actions\CreateAction $action, $data) {
                $existingProduct = \App\Models\Product::where('slug', $data['slug'])->first();
                if ($existingProduct) {
                    Notification::make()
                        ->title('Nama produk sudah ada')
                        ->body('Silakan gunakan nama produk yang berbeda.')
                        ->danger()
                        ->send();
                    $action->cancel();
                    return [];
                }
                return $data;
            }),
        ];
    }
}
