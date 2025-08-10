<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Galeri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Cache;
use App\Filament\Resources\GaleriResource\Pages;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Galeri')
                    ->required()
                    ->maxLength(255)
                    ->debounce(500)
                    ->live(onBlur: true),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Galeri')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('galeri')
                    ->preserveFilenames()
                    ->maxSize(5000) // 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Galeri')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar Galeri')
                    ->disk('public')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->after(function () {
                    // Clear the cache after editing a Galeri
                    Cache::forget('galeris');
                }),
                Tables\Actions\DeleteAction::make()->after(function () {
                    // Clear the cache after deleting a Galeri
                    Cache::forget('galeris');
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGaleris::route('/'),
        ];
    }
}
