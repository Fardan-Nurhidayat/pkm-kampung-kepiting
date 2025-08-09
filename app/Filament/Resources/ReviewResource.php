<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Reviews';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(Auth::user()->id)
                    ->required(),

                Forms\Components\Textarea::make('review')
                    ->label('Review')
                    ->required()
                    ->maxLength(1000),

                Forms\Components\DatePicker::make('visit_date')
                    ->label('Visit Date')
                    ->required(),

                Forms\Components\FileUpload::make('photo')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->maxSize(2048) // 2MB
                    ->disk('public')
                    ->columnSpanFull()
                    ->directory('reviews/photos'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('review')
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('visit_date')
                    ->label('Visit Date')
                    ->date()
                    ->sortable(),

                // Tables\Columns\ImageColumn::make('photo')
                //     ->label('Photo')
                //     ->disk('public')
                //     ->circular()
                //     ->defaultImageUrl(asset('storage/reviews/photos/01K27KQAKW2XT4589S8KPMJ40C.png')),


                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageReviews::route('/'),
        ];
    }
}
